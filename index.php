<?php
session_start();
include "controllers/data.get.php";

$title = "Catalog";
function get_content()
{

    $products = fn_products("data/products.json");

    ?>

  <div class="container">
    <?php
if (isset($_SESSION['message'])) {?>
    <div class="alert alert-<?php echo $_SESSION['class'] ?>">
        <?php echo $_SESSION['message'] ?>
    </div>

<?php
}
    if (isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin) {
        ?>
    <div class="row">
      <div class="col-md-6 mx-auto py-5">
        <form action="/controllers/system.add_product.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="product_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Price</label>
          <input type="number" name="price" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <textarea name="description" id="" cols="" rows="5" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary d-block mx-auto">Submit</button>
      </form>
      </div>
    </div>
      <?php }?>
    <div class="row my-4">
      <?php
foreach ($products as $i => $product) {
        ?>
        <div class="col-md-4 col-sm-6 my-2">
          <div class="card">
          <a href="/views/product_details.php?id=<?php echo $i ?>" class="text-dark islink img-top">
            <img src="<?php echo $product->image; ?>" alt="" class="card-img-top">
            <div class="card-body my-card">
              <h5 class="card-title"><?php echo $product->name;?></h5>
              <p class="card-text text-overflow"><?php echo $product->description; ?></p>
              <h6><?php echo "RM\n\n" . $product->price; ?></h6>
              </a>
            </div>
            <div class="card-footer">

              <?php

        if ($_SESSION['user_details']->isAdmin) {
            ?>
                  <a class="btn btn-warning" href="/views/product_edit.php?id=<?php echo $i?>">Edit</a>
                  <a class="btn btn-danger" href="/controllers/system.del_product.php?id=<?php echo $i ?>">Delete</a>

                  <?php
if ($products[$i]->isActive) {?>
                    <a href="/controllers/system.act_product.php?id=<?php echo $i ?>" class="btn btn-secondary">unActive</a>
                  <?php
} else {
                ?>
                    <a href="/controllers/system.act_product.php?id=<?php echo $i ?>" class="btn btn-success">Active</a>
                  <?php }} elseif($products[$i]->isActive) {
            ?>
                  <form action="/controllers/system.add_cart.php" method="POST">
                    <div class="input-group">
                      <input type="hidden" name="id" value="<?php echo $i ?>">
                    <input type="number" name="quantity" class="form-control" min="1"  required>
                    <div class="input-group-append">
                      <button class="btn btn-success">Add to Cart</button>
                    </div>
                    </div>
                  </form>
              <?php
}else{
  echo "<p class='lead text-center'>Out of Store</p>";
}
        ?>
            </div>
          </div>
        </div>
      <?php

}
    ;
    ?>
    </div>

  </div>


<?php
}
require_once "views/partials/layout.php";
?>
<script defer>
  $().ready(()=>{
    let popUp = document.querySelector('.alert');
  setTimeout(() => {
    <?php
unset($_SESSION['message']);
unset($_SESSION["class"]);
?>
      popUp.classList.toggle('d-none');
  }, 3000);
  })

</script>
