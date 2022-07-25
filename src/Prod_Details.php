<?php
session_start();
include "connection.php";

$stmt = "SELECT * from Products";
$row = $conn->query($stmt);
$result = $row->fetchAll(PDO::FETCH_ASSOC);

if (!isset($_POST['SaveDetails'])) {
    $_SESSION['show'] = array();
}


if (isset($_POST['SaveDetails'])) {


    $role = $_POST['selectStatus'];
    if ($role == 0) {
        foreach ($result as $x) {
            array_push($_SESSION['show'], $x['prod_id']);
        }
    } else if ($role == 1) {
        foreach ($result as $x) {

            array_push($_SESSION['show'], $x['prod_name']);
        }
    } else if ($role == 2) {
        foreach ($result as $x) {

            array_push($_SESSION['show'], $x['prod_category']);
        }
    } else if ($role == 3) {
        foreach ($result as $x) {

            array_push($_SESSION['show'], $x['prod_sub_category']);
        }
    } else if ($role == 4) {
        foreach ($result as $x) {

            array_push($_SESSION['show'], $x['prod_color']);
        }
    } else if ($role == 5) {
        foreach ($result as $x) {

            array_push($_SESSION['show'], $x['prod_price']);
        }
    }
}
// var_dump($result)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>

<body>
    <div class="showDetails">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Color</th>
                    <th>Price</th>
                </tr>
            </thead>
            <?php foreach ($result as $x) { ?>
                <tr>
                    <td>
                        <p><?php echo $x['prod_id']; ?></p>
                    </td>
                    <td>
                        <p><?php echo $x['prod_name']; ?></p>
                    </td>
                    <td>
                        <p><?php echo $x['prod_category']; ?></p>
                    </td>
                    <td>
                        <p><?php echo $x['prod_sub_category']; ?></p>
                    </td>
                    <td>
                        <p><?php echo $x['prod_color']; ?></p>
                    </td>
                    <td>
                        <p><?php echo $x['prod_price']; ?></p>
                    </td>
                </tr>

            <?php } ?>

        </table>
    </div>

    <form action="" method="post">
        <div class="specific">
            <label for="selectColumns">Choose a column:</label>

            <select name="selectStatus" id="selectColumns">
                <option value=0>ID</option>
                <option value=1>Name</option>
                <option value=2>Category</option>
                <option value=3>Sub Category</option>
                <option value=4>Color</option>
                <option value=5>price</option>

            </select>
            <input type="submit" value="Search" class="save" name="SaveDetails">
        </div>

    </form>
    <div class="show">
        <table>
            <tr>
                <?php foreach ($_SESSION['show'] as $x) { ?>
            <tr>
                <td><?php echo $x; ?></td>
            </tr>
        <?php } ?>
        </tr>
        </table>
    </div>

    <a href="destroy.php">Destroy</a>
</body>

</html>