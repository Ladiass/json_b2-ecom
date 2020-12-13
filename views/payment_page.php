<?php
    session_start();
    $title = "Payment";
    function get_content(){
    include "../controllers/data.get.php";
    $payments = fn_payments("../data/payments.php");
    ?>
    <section class="container">
        <div class="row my-4">
        <table class="table">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Price</th>
                    <th>Buyer</th>
                    <th>Transaction Code</th>
                    <!-- <th>Subtotal</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <?php
$total = 0;
        foreach ($payments as $i => $payment) {
            ?>
                        <tr>
                            <td class="text-center"><?php echo "RM\n\n".$payment->payment?></td>
                            <td class="text-center"><?php echo  $payment->buyer ?></td>
                            <td class="text-center">
                            <?php echo $payment->transaction_code?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger d-block mx-auto">Cancel</a>
                            </td>
                        </tr>
                            <?php
}
        ?>
        <tr>
            
            <td colspan="1" class=" text-center">Total: <b> RM<?php echo $total ; ?></b></td>
        </tr>
            </tbody>
        </table>

        </div>
    </section>
    


<?php
    }
    include "partials/layout.php";