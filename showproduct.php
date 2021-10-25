<?php include "adminvalidator.php";?>
<?php 
require("inc/db.php");
$Pid = $_GET['Pid'] ? intval($_GET['Pid']) : 0;

try {
    $sql = "SELECT * FROM product WHERE Pid = :Pid LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":Pid", $Pid, PDO::PARAM_INT);
    $stmt->execute();    
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

if (!$stmt->rowCount()) {
    header("Location: editProduct.php");
    exit();
}
$product = $stmt->fetch();

?>

<?php include("inc/header.php") ?>
    <div class="container">
        <a href="editProduct.php" class="btn btn-light mb-3"><< Go Back</a>
        <!-- Show  a Product -->
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-database"></i> Show Product</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <table class="table table-bordered table-striped">
                            <tr>
                                
                                <th>Name</th>
                                <td><?= $product['Pname'] ?></td>
                            </tr>   
                            <tr>
                                <th>Price</th>
                                <td>$<?= number_format($product['price'], 2) ?></td>
                                <th>category</th>
                                <td><?= $product['category'] ?></td>
                            </tr>  
                            <tr>
                                <th>Descriptoin</th>
                                <td colspan="3"><?= $product['description'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-3">
                        <img src="<?= $product['imgAddress'] ?>" alt="<?= $product['Pname'] ?>" class="img-fluid img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Show a product -->
        <br>
    </div><!-- /.container -->
<?php include("inc/footer.php") ?>