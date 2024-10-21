<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .purchase-history {
            width: 100%;
            border-collapse: collapse;
        }
        .purchase-history th, .purchase-history td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .purchase-history th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Purchase History</h1>
        </div>
        <table class="purchase-history">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($history as $purchase)
                    <tr>
                        <td>{{ $purchase->purchased_at }}</td>
                        <td>{{ $purchase->item_name }}</td> 
                        <td>{{ $purchase->quantity }}</td>
                        <td>${{ number_format($purchase->total_cost, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
