<?php
  session_start();

$title = "Login";
function get_content()
{
    if(!isset($_SESSION['user_details'])){
?>

    <div class="container py-5">
        <div class="row">
            <h2 class="text-center mb-5 mx-auto">Login</h2>
            <div class="col-md-6 mx-auto">
                <form action="/controllers/system.login.php" method="POST">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button class="btn btn-success">Login</button>
                </form>
            </div>
        </div>
    </div>

<?php
}}
require_once '../partials/layout.php';
?>
