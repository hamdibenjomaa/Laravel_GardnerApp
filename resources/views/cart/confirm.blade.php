<!-- confirm.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <link href="{{ asset('img/favicon.ico') }}" rel="icon">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Confirm Checkout</h1>

        <p>Total amount: ${{ number_format($totalCost, 2) }}</p>

        
        <h3>Your Cart Items:</h3>
        <ul>
            @foreach($cartItems as $cartItem)
                <li>{{ $cartItem->item->name }} - Quantity: {{ $cartItem->quantity }}</li>
            @endforeach
        </ul>

        <form action="{{ route('cart.confirmCheckout') }}" method="POST">
    @csrf
    <input type="hidden" name="totalAmount" value="{{ $totalCost }}">
    <button type="submit" class="btn btn-success">Confirm</button>
    <a href="{{ route('cart.show') }}" class="btn btn-danger">Cancel</a>
</form>

    </div>
</body>
</html>
