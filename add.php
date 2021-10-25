<?php include "adminvalidator.php";?>
<?php 
require("inc/db.php");

if ($_POST) {
    $Pname        = trim($_POST['Pname']);
    $price        = (float) $_POST['price'];
    $category     = trim($_POST['category']);
    $imgAddress  = trim($_POST['image']);
    $description  = trim($_POST['description']);

    try {
        $sql = 'INSERT INTO product( Pname, price, category, imgAddress, description) 
                VALUES( :Pname, :price, :category, :imgAddress, :description)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":Pname", $Pname);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":category", $category);
        $stmt->bindParam(":imgAddress", $imgAddress);
        $stmt->bindParam(":description", $description);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: create.php?status=created");
            exit();
        }
        header("Location: create.php?status=fail_create");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: create.php?status=fail_create");
    exit();
}
?>