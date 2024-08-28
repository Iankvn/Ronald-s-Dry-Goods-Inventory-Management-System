<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Product</title>
    <link href="https://fonts.googleapis.com/css?family=Arya" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/icon.png">
    <style>
        body {
            font-family: 'Arya', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #search-container {
            width: 80%;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }
        #q, select, #log, #back-btn input {
            margin: 10px;
            height: 40px;
            border: none;
            border-radius: 3px;
            padding-left: 10px;
            font-family: 'Arya';
            border-bottom: 2px solid blue;
        }
        #q, select {
            flex: 1 1 200px;
            min-width: 200px;
        }
        #log, #back-btn input {
            width: 100px;
            color: aliceblue;
            cursor: pointer;
            background-color: #8ecae6;
            text-align: center;
        }
        #log:hover, #back-btn input:hover {
            background-color: #219ebc;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #023047;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #C5C5C5;
        }
        tr:hover {
            background-color: #8ecae6;
        }
        .message {
            text-align: center;
            color: #ff0000;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div id="search-container">
        <form method="post" action="search.php">
            <input type="text" name="q" id="q" placeholder="Search Query...">
            <select name="column">
                <option value="">Select Filter</option>
                <option value="productid">Product ID</option>
                <option value="productname">Product</option>
                <option value="price">Price</option>
            </select>
            <input type="submit" name="submit" id="log" value="Find">
            <div id="back-btn">
                <a href="inventory.php">
                    <input type="button" id="log" value="Back">
                </a>
            </div>
        </form>
        <table id="inventory">
            <tr>
                <th>Product ID</th>
                <th>Product</th>
                <th>Price</th>
            </tr>
            <?php
                if (isset($_POST['submit'])) {
                    $connection = new mysqli("localhost", "root", "", "my_db");
                    $q = $connection->real_escape_string($_POST['q']);
                    $column = $connection->real_escape_string($_POST['column']);

                    if ($column == "" || ($column != "productid" && $column != "productname" && $column != "price"))
                        $column = "productid";

                    $sql = $connection->query("SELECT `productid`, `productname`, `price` FROM product WHERE $column LIKE '%$q%'");
                    if ($sql->num_rows > 0) {
                        while ($data = $sql->fetch_array()) {
                            echo "<tr><td>".$data["productid"]."</td><td>".$data["productname"]."</td><td>".$data["price"]."</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3' class='message'>Your search query doesn't match any data!</td></tr>";
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>
