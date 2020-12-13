
<nav class="navbar navbar-expand-md navbar-light bg-light">

    <a class="navbar-brand" href="/">B2 ECOM </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

            <li class="nav-item">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li> -->

            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php 
                    if(isset($_SESSION['user_details']->username)){
                        echo ucfirst($_SESSION['user_details']->username);
                    }else{
                        echo "User";
                    }
                ?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownId">
                    <?php
                    if(!isset($_SESSION['user_details'])){
                    ?>
                    <a class="dropdown-item" href="/views/forms/login.php">Login</a>
                    <a class="dropdown-item" href="/views/forms/register.php">Regsiter</a>

                    <?php } ?>
                    

                    <?php if(isset($_SESSION['user_details'])&& $_SESSION['user_details']->isAdmin == false){?>
                        <a class="dropdown-item" href="/views/cart.php">Cart</a>

                    <?php 
                        }
                        if(isset($_SESSION['user_details'])&& $_SESSION['user_details']->isAdmin == true){?>
                        
                        <a class="dropdown-item" href="/views/payment_page.php">Payment</a>
                    <?php 
                        }
                        if(isset($_SESSION['user_details'])){
                    ?>

                        <a class="dropdown-item" href="/controllers/system.logout.php">Logout</a>

                    <?php } ?>

                </div>
            </li>
        </ul>
        
    </div>
</nav>