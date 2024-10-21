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
        <h3>Balance: ${{ number_format(Auth::user()->balance, 2) }}</h3> <!-- Display balance here -->

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
 
    <h3>Total: ${{ number_format($total, 2) }}</h3>
    <a href="{{ route('cart.checkout') }}" class="btn btn-primary mt-3">Proceed to Checkout</a>
    <a href="{{ route('providers.index') }}" class="btn btn-secondary mt-3">Continue Shopping</a>
</div>

      
        @else
            <p>Your cart is empty.</p>
            <a href="{{ route('providers.index') }}" class="btn btn-secondary mt-3">Continue Shopping</a>
            <a href="{{ route('history') }}" class="btn btn-success mt-3">View Purchase History</a>
        @endif
    </div>
</body>

<script>
    document.querySelector('.btn-primary').addEventListener('click', function(event) {
        event.preventDefault();
        const totalAmount = {{ $total }};
        const userBalance = {{ Auth::user()->balance }};
        
        if (userBalance < totalAmount) {
            alert('Insufficient balance!');
            return;
        }

        if (confirm(`Are you sure you want to proceed to checkout? Total amount: $${totalAmount}`)) {
            window.location.href = this.href; 
        }
    });
</script>

</html>
