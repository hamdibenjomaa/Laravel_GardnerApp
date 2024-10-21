<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gardener - Gardening Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


</head>
<body>
    <div class="container table-container">
        <h1 class="text-center my-4">Your Purchase History</h1>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Total Cost</th>
                    <th>Purchased At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($history as $entry)
                    <tr>
                        <td>{{ $entry->item_name }}</td>
                        <td>{{ $entry->quantity }}</td>
                        <td>${{ number_format($entry->cost, 2) }}</td>
                        <td>${{ number_format($entry->total_cost, 2) }}</td>
                        <td>{{ $entry->purchased_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('cart.show') }}" class="btn btn-primary">Back to Cart</a>
        <a href="{{ route('purchase.pdf') }}" class="btn btn-success my-3">Download PDF</a>

    </div>
</body>

</html>
