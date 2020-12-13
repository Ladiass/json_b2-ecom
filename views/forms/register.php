<?php
  session_start();

$title = "Register";
function get_content() {
?>

    <div class="container py-5">
        <div class="row">
            <h2 class="text-center mb-5 mx-auto">Register</h2>
            <div class="col-md-6 mx-auto">
                <form action="/controllers/system.register.php" method="POST">
                    <div class="form-group">
                        <label for="">FullName</label>
                        <input type="text" name="fullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password2" class="form-control">
                    </div>
                    <button class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>

<?php
}
require_once '../partials/layout.php';
?>