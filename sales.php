<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
	<link rel="icon" type="image/x-icon" href="images/icon.png">
	<link href='https://fonts.googleapis.com/css?family=Alef' rel='stylesheet'>
    <link rel="stylesheet" href="css/inventory.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<?php include('header.php'); ?>
<body>
<div class="header">
        <a href="#default" class="logo">RONALD'S DRY GOODS STORE</a>
        <div class="header-right">
        <a href="dash.php">Dashboard</a>
            <a  href="inventory.php">Inventory</a>
            <a class="active" href="sales.php">Sales Report</a>
        </div>
      
    </div>
	<div class="container">
        <h1 class="page-header text-center">HISTORY OF OREDERED PRODUCTS</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="#paddproduct" data-toggle="modal" class="pull-right btn btn-primary-custom btn-add-product">
                    <span class="glyphicon glyphicon-plus"></span> Provider
                </a>
                <a href="search2.php" class="pull-right btn btn-primary-custom btn-search">
                    <span class="glyphicon glyphicon-search"></span> Search
                </a>
            </div>
        </div>
        <div style="margin-top:10px;">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Provider's Name</th>
                    <th>Contact Number</th>
                    <th>Location</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                        $where = "";
                        if(isset($_GET['historyid']))
                        {
                            $historyid = $_GET['historyid'];
                            $where = " WHERE history.historyid = $historyid";
                        }
                        $sql = "SELECT * FROM history LEFT JOIN category ON category.categoryid = history.historyid $where ORDER BY history.historyid ASC, history.pname ASC";
                        $query = $conn->query($sql);    
                        while($row = $query->fetch_array()){
                            ?>
                            <tr>
                                <td><?php echo $row['pname']; ?></td>
                                <td><?php echo $row['pcontact'];?></td>
                                <td><?php echo $row['location']; ?></td>
                                <td>
                                    <a href="#peditproduct<?php echo $row['historyid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || 
                                    <a href="#pdeleteproduct<?php echo $row['historyid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                    <?php include('pproduct_modal.php'); ?>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('pmodal.php'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#catList").on('change', function(){
                if($(this).val() == 0)
                {
                    window.location = 'sales.php';
                }
                else
                {
                    window.location = 'sales.php?category=' + $(this).val();
                }
            });
        });
    </script>
</body>
</html>
