<?php
    if(!isset($_POST["email"])) {
        header('Location: contact.html');
        die();
    } else {
        mail($_POST["email"], "Contact Me", "This is my contact email!");
        header('Location: contact.html');
        die();
    }
?>