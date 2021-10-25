<?php include "adminvalidator.php";?>
<?php 
require("inc/db.php");

if ($_POST) {
    $Pid          = (int) $_POST['Pid'];
    $Pname        = trim($_POST['Pname']);
    $price        = (float) $_POST['price'];
    $category     = trim($_POST['category']);
    $imgAddress   = trim($_POST['imgAddress']);
    $description  = trim($_POST['description']);

    try {
        $sql = 'UPDATE product 
                    SET Pname = :Pname, price = :price,category = :category, imgAddress = :imgAddress, description = :description 
                WHERE Pid = :Pid';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":Pname", $Pname);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":category", $category);
        $stmt->bindParam(":imgAddress", $imgAddress);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":Pid", $Pid);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: edit.php?Pid=".$Pid."&status=updated");
            exit();
        }
        header("Location: edit.php?Pid=".$Pid."&status=fail_update");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: edit.php?Pid=".$Pid."&status=fail_update");
    exit();
}
?>