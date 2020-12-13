<?php
    session_start();
    if(!$_SESSION['user_details']->isAdmin){
        header("Location: /views/404.php");
    }
    $title = "Edit | Product Details";
    function get_content(){
        include "../controllers/data.get.php";
        $products = fn_products("../data/products.json");
        $id = $_GET['id'];
        if($_SESSION['user_details']->isAdmin){
    ?>
    
    <form action="/controllers/system.edit_product.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
    <section class="container">
        <div class="row my-5 align-items-center">
            <div class="imgtop col-12 col-md-5 px-3">
                <img src="<?php echo $products[$id]->image?>" alt="" class="w-100">
                <input type="file" value="Image Edit" class="form-control" name="product_image">

                <input type="hidden" name="current_image" value="<?php echo $products[$id]->image?>">
                
            </div>
            <div class="col-md-7 col-11 product-text my-2 pl-3">
               <h3><input type="text" value="<?php echo $products[$id]->name?>" class="form-control" name="product_name"></h3>
                <h4 class="my-4 text-warning">RM <input type="number" value="<?php echo $products[$id]->price?>" name="product_price" class="px-2"></h4>
            </div>
                
            <div class="col-12 py-3 px-4">
                <h6>Description</h6>
                <textarea name="product_description" id="" cols="122" rows="8" class="lead p-2"><?php echo $products[$id]->description?></textarea>
            </div>
            <div class="mx-auto">
                <a href="/views/product_details.php?id=<?php echo $id?>" class="btn btn-danger mx-2">Cancel</a>
                <button class="btn btn-primary mx-2">Done</button>
            </div>
        </div>
    </section>
    
    </form>
    



<?php
    }
}
    include "partials/layout.php"
?>