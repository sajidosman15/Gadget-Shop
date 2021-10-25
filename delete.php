<?php include "adminvalidator.php";?>
<?php 
require("inc/db.php");

if (isset($_GET['Pid'])) {
    // Delete record
    try {
        // SQL Statement
        $sql = 'DELETE FROM cart WHERE Pid = :Pid';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":Pid", $_GET['Pid'], PDO::PARAM_INT);
        $stmt->execute();

        $sql = 'DELETE FROM product WHERE Pid = :Pid LIMIT 1';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":Pid", $_GET['Pid'], PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: editProduct.php?status=deleted");
            exit();
        }
        header("Location: editProduct.php?status=fail_delete");
        exit();
    } catch (Exception $e) {
        header("Location: editProduct.php?status=in_cart");
        exit();
    }
} else {
    // Redirect to index.php
    header("Location: editProduct.php?status=fail_delete");
    exit();
}