<?php
$conn = new mysqli('localhost', 'root', '', 'my_db');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product data
$product_sql = "SELECT * FROM product LEFT JOIN category ON category.categoryid = product.categoryid ORDER BY product.categoryid ASC, productname ASC";
$product_result = $conn->query($product_sql);

// Fetch provider data
$provider_sql = "SELECT * FROM history";
$provider_result = $conn->query($provider_sql);

// Calculate total products
$totalProducts = 0;
$products = array();
if ($product_result->num_rows > 0) {
    while($row = $product_result->fetch_assoc()) {
        $totalProducts ++;
        $products[] = $row;
    }
}

// Calculate total providers
$totalProviders = 0;
$providers = array();
if ($provider_result->num_rows > 0) {
    while($row = $provider_result->fetch_assoc()) {
        $totalProviders++;
        $providers[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .list-container {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="images/icon.png">
    <link href='https://fonts.googleapis.com/css?family=Alef' rel='stylesheet'>
    <link rel="stylesheet" href="css/inventory.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Link to the new CSS file -->
    <script src="admin.js"></script>
    <script src="try.js"></script>
</head>
<?php include('header.php'); ?>
<body>
    <div class="header">
        <a href="#default" class="logo">RONALD'S DRY GOODS STORE </a>
        <div class="header-right">
        <a class="active" href="dash.php">Dashboard</a>
            <a href="inventory.php">Inventory</a>
            <a href="sales.php">Sales Report</a>
        </div>
    </div>
    <div class="container dashboard">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text" id="total-products"><?php echo $totalProducts; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Providers</h5>
                    <p class="card-text" id="total-providers"><?php echo $totalProviders; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6"> <!-- Adjusted here -->
            <div class="card">
                <div class="card-header">
                    Product List
                </div>
                <div class="card-body list-container">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['productname']; ?></td>
                                <td>&#8369; <?php echo $product['price']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6"> <!-- Adjusted here -->
            <div class="card">
                <div class="card-header">
                    Provider List
                </div>
                <div class="card-body list-container">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Provider Name</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($providers as $provider): ?>
                            <tr>
                                <td><?php echo $provider['pname']; ?></td>
                                <td><?php echo $provider['pcontact']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
