    <!-- Heading starts here -->
    <section class="head">
            <div class="logo">
                <i onclick="barshow()" class="fas fa-bars icon bars"></i>
                <a style="text-decoration: none;" href="index.php"><h2>Gadget Shop</h2></a>
                <img src="Images/icon.png" alt="">
            </div>
            <div class="search">
                <form action="search.php" method="GET" >
                    <input type="text" placeholder="Search Products" name="search">
                    <button><i class="fas fa-search"></i></button>
                </form>
                <!-- <input type="text" placeholder="Search Products">
                <a href="search.php"><i class="fas fa-search"></i></a> -->
            </div>
            <div class="search-hidden">
                <form action="search.php" method="GET" class="search-hidden">
                    <input type="text" placeholder="Search Products" name="search">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            
            <div class="buttons">
                <i onclick="searchshow()" class="fas fa-search hidden-search"></i>
                <a href="mycart.php" class="my-cart"><i class="fas fa-shopping-cart"></i>My Cart</a>
                <a href='logout.php' class="logout"><i class="fas fa-sign-out-alt"></i>
                <?php 
                    if(isset($_SESSION['username'])){
                        echo "Logout";
                    }
                    else{
                        echo "Login";
                    } ?>
                </a>
                <i onclick="hiddenshow()" class="fas fa-ellipsis-v" id="three-dot"></i>
            </div>
            <div class="hidden-buttons">
                <a href="mycart.php" class="my-cart"><i class="fas fa-shopping-cart"></i>My Cart</a>
                <a href='logout.php' class="logout"><i class="fas fa-sign-out-alt"></i>
                <?php 
                    if(isset($_SESSION['username'])){
                        echo "Logout";
                    }
                    else{
                        echo "Login";
                    } ?>
            </a>
            </div>
    </section>

    <!-- Heading Ends here -->

    <!-- sidebar start here -->
    <section class="sidebar">
        <ul>
            <li class="slide-list"><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
            <li class="slide-list"><a href="user_profile.php"><i class="fas fa-user-circle"></i>My Profile</a></li>
            <li class="slide-list"><a href="myorders.php"><i class="fas fa-shopping-cart"></i>My Orders</a></li>
            <li onclick="show()" class="slide-list"><a class="cursor"><i class="fas fa-th-list"></i>Category</a></li>
            <div class="sub-list">
                <li><a href="category.php?category=<?php echo "Features Phone" ?>"><i class="far fa-arrow-alt-circle-right"></i></i>Features Phone</a></li>
                <li><a href="category.php?category=<?php echo "Computer Accessories" ?>"><i class="far fa-arrow-alt-circle-right"></i>Computer Accessories</a></li>
                <li><a href="category.php?category=<?php echo "Sensor" ?>"><i class="far fa-arrow-alt-circle-right"></i></i>Sensor</a></li>
                <li><a href="category.php?category=<?php echo "Robot" ?>"><i class="far fa-arrow-alt-circle-right"></i>Robot</a></li>
                <li><a href="category.php?category=<?php echo "Arduino" ?>"><i class="far fa-arrow-alt-circle-right"></i>Arduino</a></li>
            </div>
            <li class="slide-list"><a href="contactus.php"><i class="fas fa-phone-square"></i>Contact Us</a></li>
            <?php 
            if(isset($_SESSION['username'])){
            if($_SESSION['username']=="admin"){ ?>
            <li class="slide-list"><a href="vieworders.php"><i class="fas fa-eye"></i>View Orders</a></li>
            <li class="slide-list"><a href="create.php"><i class="fas fa-plus-square"></i>Add Product</a></li>
            <li class="slide-list"><a href="editProduct.php"><i class="fas fa-edit"></i>Edit Product</a></li>
            <?php } }?>
        </ul>
    </section>
    <!-- sidebar ends here -->