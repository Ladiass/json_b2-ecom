<?php
    $title = "404";
    function get_content(){
    ?>
    <div class="error-page">
        <h1>404</h1>
        <p class="lead">Got somthing is Error!</p>
        <a href="/">Back to Home Page</a>
    </div>
<?php
    };
    include "partials/layout.php";
?>