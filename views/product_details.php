<?php
    session_start();
    $title = "Product Details";
    function get_content(){
        include "../controllers/data.get.php";
        $products = fn_products("../data/products.json");
        $id = $_GET['id'];
    ?>
    <section class="container">
    <?php
      if(isset($_SESSION['message'])){?>
    <div class="alert alert-<?php echo $_SESSION['class']?>">
        <?php echo $_SESSION['message']?>
    </div>

<?php
      }?>
        <div class="row my-5 align-items-center">
            <div class="imgtop col-12 col-md-5 px-3">
                <img src="<?php echo $products[$id]->image?>" alt="" class="w-100">
            </div>
            <div class="col-md-7 col-11 product-text my-2 pl-3">
                <h3><?php echo $products[$id]->name?></h3>
                <h4 class="my-4 text-warning">RM <?php echo $products[$id]->price?></h4>
                <?php if($_SESSION['user_details']->isAdmin == false){
                    if($products[$id]->isActive){
                    ?>
                    <form action="/controllers/system.add_cart.php" method="POST">
                    <div class="input-group num-input float-left">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="number" name="quantity" class="form-control" min="1"  value="1" required>
                        <div class="input-group-append">
                            <button href="" class="btn btn-warning mx-2">Add to Card</button>
                        </div>
                    </div>
                </form>
                <a href="" class="btn btn-primary mx-2">Buy</a>

                    
                
                <?php }else{?>
                    <div class="bg-light p-3">
                    <p class="lead">Product is Out of Store !</p>
                    </div>
                <?php }}else{?>

                    <a href="/views/product_edit.php?id=<?php echo $id?>" class="btn btn-warning">Edit</a>
                    <a href="/controllers/system.del_product.php?id=<?php echo $id?>" class="btn btn-danger">Delete</a>
                    
                    <?php
                    if($products[$id]->isActive){?>
                    <a href="/controllers/system.act_product.php?id=<?php echo $id?>" class="btn btn-secondary">unActive</a>
<?php
                        }else{
                                ?>
                    <a href="/controllers/system.act_product.php?id=<?php echo $id?>" class="btn btn-success">Active</a>
                <?php }}?>
            </div>
                
            <div class="col-12 py-3 px-4">
                <h6>Description</h6>
                <p class="lead"><?php echo $products[$id]->description?></p>
            </div>
            <small class="mx-auto"><a href="/">Back to Home Page</a></small>
        </div>
    </section>
    



<?php
    }
    include "partials/layout.php"
?>
<script defer>
  let popUp = document.querySelector('.alert');
  setTimeout(() => {
    <?php unset($_SESSION['message']);
      unset($_SESSION["class"]);
    ?>
      popUp.classList.toggle('d-none');
  }, 1500);
</script>