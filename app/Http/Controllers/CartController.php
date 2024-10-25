<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Item;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\SMSService;
use App\Models\Coupon;


class CartController extends Controller
{
    public function addToCart(Request $request, $itemId)
    {
        $quantity = (int) $request->input('quantity', 1);
        $user = Auth::user();
        $item = Item::findOrFail($itemId);
    
    
        if ($item->availability !== 'available' || $item->stock < $quantity) {
            return response()->json(['success' => false, 'message' => 'Item unavailable or insufficient stock.'], 400);
        }
    
        $cart = $user->cart ?? Cart::create(['user_id' => $user->id]);
    
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('item_id', $itemId)
            ->first();
    
        if ($cartItem) {
            $newQuantity = $cartItem->quantity + $quantity;
    
            if ($newQuantity > $item->stock) {
                return response()->json(['success' => false, 'message' => 'Cannot order more than available stock.'], 400);
            }
    
            $cartItem->quantity = $newQuantity;
            $cartItem->save();
        } else {
            CartItem::create(['cart_id' => $cart->id, 'item_id' => $itemId, 'quantity' => $quantity]);
        }
    
        return response()->json(['success' => true]);
    }
    
    public function showCart()
    {
        $discount = session('discount', 0);
    
      
        if ($discount > 0 && request()->route()->getName() !== 'cart.show') {
            session()->forget('discount');
        }
    
        $cart = Auth::user()->cart;
    
        if (!$cart || $cart->items->isEmpty()) {
            // Set default values for empty cart
            return view('cart.show', [
                'cartItems' => [],
                'total' => 0,
                'discount' => 0,
                'totalAfterDiscount' => 0 
            ]);
        }
    
        $cartItems = $cart->items->map(function ($cartItem) {
            return [
                'id' => $cartItem->id,
                'name' => $cartItem->item->name,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->item->cost,
            ];
        });
    
        $total = $cartItems->sum(fn($item) => $item['price'] * $item['quantity']);
        $totalAfterDiscount = $total - ($total * $discount / 100);
    
        return view('cart.show', compact('cartItems', 'total', 'discount', 'totalAfterDiscount'));
    }
    



    public function removeFromCart($itemId)
{
    $cart = Auth::user()->cart;
    $cartItem = $cart->items()->where('id', $itemId)->first();

    if ($cartItem) {
        $cartItem->delete();
    }

    return redirect()->route('cart.show')->with('success', 'Item removed from cart.');
}



public function checkout()
{
    $cart = Auth::user()->cart;
    $cartItems = $cart->items;

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
    }

    $totalCost = $cartItems->sum(fn($item) => $item->item->cost * $item->quantity);
    $discount = session('discount', 0);
    $totalAfterDiscount = $totalCost - ($totalCost * $discount / 100); 

    if (Auth::user()->balance < $totalAfterDiscount) {
        return redirect()->route('cart.show')->with('error', 'Insufficient balance.');
    }

    return view('cart.confirm', compact('cartItems', 'totalAfterDiscount', 'discount')); 
}





public function confirmCheckout(Request $request)
{
    $cart = Auth::user()->cart;
    $cartItems = $cart->items;

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
    }


    $totalCost = $cartItems->sum(fn($item) => $item->item->cost * $item->quantity);
    $discount = session('discount', 0);
    $totalAmount = $totalCost - ($totalCost * $discount / 100); 

    $user = Auth::user();

    if ($user->balance < $totalAmount) {
        return redirect()->route('cart.show')->with('error', 'Insufficient balance for checkout.');
    }

    DB::beginTransaction();
    try {
        $user->decrement('balance', $totalAmount); 

        foreach ($cartItems as $cartItem) {
            $item = $cartItem->item;
            $item->decrement('stock', $cartItem->quantity);

            if ($item->stock === 0) {
                $item->availability = 'unavailable';
                $item->save();
            }

            DB::table('histories')->insert([
                'user_id' => $user->id,
                'item_id' => $item->id,
                'item_name' => $item->name,
                'quantity' => $cartItem->quantity,
                'cost' => $item->cost,
                'total_cost' => $cartItem->quantity * $item->cost,
                'purchased_at' => now(),
            ]);

            $cartItem->delete();
            session ()->forget('discount');
        }

        DB::commit();

        $message = "Thank you for your purchase! Your order has been confirmed.";
        $this->smsService->sendSMS($user->phone_number, $message);

        return redirect()->route('cart.show')->with('success', 'Checkout successful.');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->route('cart.show')->with('error', 'An error occurred during checkout. Please try again.');
    }
}

public function history()
{
    $user = Auth::user();
    $history = $user->history()->orderBy('purchased_at', 'desc')->get();

    return view('frontOffice.history.index', compact('history'));
}


    public function generatePDF()
    {
        $user = Auth::user();
        $history = $user->history()->orderBy('purchased_at', 'desc')->get();

        $pdf = PDF::loadView('frontOffice.history.purchase-history-pdf', compact('history'));
        return $pdf->download('purchase-history.pdf');
    }



    public function __construct(SMSService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function applyCoupon(Request $request)
    {
        $code = $request->input('coupon_code');
        $coupon = Coupon::where('code', $code)->first();
    
        if (!$coupon) {
            return response()->json(['success' => false, 'message' => 'Invalid coupon code.']);
        }
    
        if ($coupon->expires_at && now()->greaterThan($coupon->expires_at)) {
            return response()->json(['success' => false, 'message' => 'This coupon has expired.']);
        }
    
        $discount = $coupon->discount;
        session(['discount' => $discount]);
    
        return response()->json(['success' => true, 'discount' => $discount, 'message' => 'Coupon applied successfully!']);
    }
    
}
