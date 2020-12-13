<?php

session_start();
include "../controllers/data.get.php";
$title = "Cart Page";
function get_content()
{
    $products = fn_products("../data/products.json");

    ?>
<div class="container p-3">
    <h2><i class="fas fa-shopping-cart mr-3 text-primary"></i>Your Cart</h2>
<?php
if (isset($_SESSION['cart'])) {?>
        <table class="table">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <?php
$total = 0;
        foreach ($products as $i => $product) {
            if (isset($_SESSION['cart'][$i])) {
                $subtotal = $product->price * $_SESSION['cart'][$i];
                $total += $subtotal;
                ?>

                <tr>
                    <td><?php echo $product->name ?></td>
                    <td class="text-center"><?php echo "RM\n\n" . $product->price ?></td>
                    <td class="text-center">
                    <form action="/controllers/cart.edt.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $i ?>">
                        <input type="number" min="1" value="<?php echo $_SESSION['cart'][$i] ?>" class="form-control input-quantity" name="quantity">
                    </form>

                    </td>
                    <td class="text-center"><?php echo "RM\n\n" . $subtotal ?></td>
                    <td>
                        <a href="/controllers/cart.del.php?id=<?php echo $i ?>" class="btn btn-danger d-block mx-auto">Delete</a>
                    </td>
                </tr>
                <?php
}}
        ?>
        <tr>
            <td colspan="3">
            <form action="/controllers/cart.checkout.php" method="POST" class="float-left">
                
                <input type="hidden" name="total" value="<?echo $total ?>">
                <button class="btn btn-primary">Checkout</button>
            </form>
                <a class="btn btn-danger float-left ml-2" href="/controllers/cart.clr.php">Clear Cart</a>
            </td>
            <td>Total: <b> RM<?php echo $total; ?></b></td>
        </tr>
            </tbody>
        </table>



        <?php
} else {
        ?>

<p class="pt-4 pb-2">Your cart was clear</p>
<a href="/">Back to Home Page , continue shopping</a>

<?php }?>


</div>
<?php
}
include "partials/layout.php";
?>

<script type="text/javascript">
    let oDiv = document.querySelectorAll('.input-quantity');
    oDiv.forEach(quantityInput =>{
        quantityInput.onchange = (e)=>{
            quantityInput.parentElement.submit();

            // clearTimeout(submit);
            // let submit = setInterval(() => {
            // }, 1000);

        }
    })

</script>