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
        <?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Updated</strong>
        </div>
        <?php endif ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Fail Update</strong>
        </div>
        <?php endif ?>
        <!-- Create Form -->
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-edit"></i> Edit Product</strong>
            </div>
            <div class="card-body">
                <form action="update.php" method="post">
                    <input type="hidden" name="Pid" value="<?= $product['Pid'] ?>">
                    <div class="form-row">
                       
                        <div class="form-group col-md-6">
                            <label for="Pname" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="Pname" name="Pname" placeholder="Name" required value="<?= $product['Pname'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="price" class="col-form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price" required value="<?= $product['price'] ?>" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="category" class="col-form-label">category</label>
                            <input type="text" class="form-control" name="category" id="category" placeholder="category" required value="<?= $product['category'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="imgAddress" class="col-form-label">imgAddress</label>
                            <input type="text" class="form-control" name="imgAddress" id="imgAddress" placeholder="Image URL" value="<?= $product['imgAddress'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">Description</label>
                        <textarea name="description" id="" rows="5" class="form-control" placeholder="Description"><?= $product['description'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
                </form>
            </div>
        </div>
        <!-- End create form -->
        <br>
    </div><!-- /.container -->
<?php include("inc/footer.php") ?>