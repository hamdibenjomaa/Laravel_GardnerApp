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
        <h1>Your Shopping Cart</h1>
        <h3>Balance: ${{ number_format(Auth::user()->balance, 2) }}</h3>
        
        <form id="couponForm" class="mt-3">
            @csrf
            <div class="input-group">
                <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Enter coupon code" required>
                <button type="button" class="btn btn-success" id="applyCouponBtn">Apply Coupon</button>
            </div>
        </form>

        <div id="couponMessage"></div>
        
        @if (count($cartItems) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-end">
                <h3>Subtotal: ${{ number_format($total, 2) }}</h3>
                <h4 id="discountDisplay">Discount: {{ $discount }}%</h4>
                <h3 id="totalAfterDiscountDisplay">Total after Discount: ${{ number_format($totalAfterDiscount, 2) }}</h3>
                <a href="{{ route('cart.checkout') }}" class="btn btn-primary mt-3">Proceed to Checkout</a>
                <a href="{{ route('providers.index') }}" class="btn btn-secondary mt-3">Continue Shopping</a>
            </div>
        @else
            <p>Your cart is empty.</p>
            <a href="{{ route('providers.index') }}" class="btn btn-secondary mt-3">Continue Shopping</a>
            <a href="{{ route('history') }}" class="btn btn-success mt-3">View Purchase History</a>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#applyCouponBtn').click(function() {
                var couponCode = $('#coupon_code').val();
                $.ajax({
                    url: '{{ route("cart.applyCoupon") }}',
                    method: 'POST',
                    data: {
                        coupon_code: couponCode,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#couponMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                            let discount = response.discount;
                            let subtotal = {{ $total }};
                            let totalAfterDiscount = subtotal - (subtotal * (discount / 100));
                            $('#discountDisplay').text('Discount: ' + discount + '%');
                            $('#totalAfterDiscountDisplay').text('Total after Discount: $' + totalAfterDiscount.toFixed(2));
                        } else {
                            $('#couponMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                        }
                    },
                    error: function(xhr) {
                        $('#couponMessage').html('<div class="alert alert-danger">An error occurred while applying the coupon.</div>');
                    }
                });
            });
        });
    </script>
    <script>
    document.querySelector('.btn-primary').addEventListener('click', function(event) {
        event.preventDefault();
        const totalAmount = {{ $totalAfterDiscount }};
        const userBalance = {{ Auth::user()->balance }};
        
        if (userBalance < totalAmount) {
            alert('Insufficient balance!');
            return;
        }

     
    });
</script>
</body>
</html>
