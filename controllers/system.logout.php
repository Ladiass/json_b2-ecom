<?php
    session_start();
    //to accesss session varibales and to use session methods a session should be started

    //empty out session variables
    session_unset();

    //destroy all data register to a session
    session_destroy();

    header('Location: /');