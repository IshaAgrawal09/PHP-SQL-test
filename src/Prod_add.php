<?php
session_start();
include "connection.php";

if (isset($_POST['saveProductDetails'])) {
    $id = $_POST['id'];
    $name = $_POST['prod_name'];
    $category = $_POST['category'];
    $sub = $_POST['sub'];
    $color = $_POST['color'];
    $price = $_POST['price'];

    $stmt = "SELECT * from `Products`";
    $row = $conn->query($stmt);
    $result = $row->fetchAll(PDO::FETCH_ASSOC);

    $stmt = "INSERT into `Products` values(null,'" . $name . "','" . $category . "','" . $sub . "','" . $color . "','" . $price . "')";
    $conn->exec($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product_Add</title>
</head>

<body>
    <h1>Product Add Form</h1>
    <form action="" method="post">
        <div>
            <label for="id">ID</label>
            <input type="text" name="id" id="Id">
        </div>
        <div>
            <label for="prod_name">Product Name</label>
            <input type="text" id="name" name="prod_name">
        </div>
        <div>
            <label for="category">Category</label>
            <input type="text" id="category" name="category">
        </div>
        <div>
            <label for="sub">Sub Category</label>
            <input type="text" id="sub" name="sub">
        </div>
        <div>
            <label for="color">Color</label>
            <input type="text" id="color" name="color">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" id="price" name="price">
        </div>
        <input type="submit" value="Save" class="save" name="saveProductDetails">
    </form>
    <a href="Prod_Details.php">Product Details</a>

    
</body>

</html>