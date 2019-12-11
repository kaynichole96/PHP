<?php
    session_start();

    if(!isset($_SESSION["logged_in"])) {
        header('Location: adminLogin.php');
        die();
    }

    if(!isset($_GET["id"])) {
        $_SESSION["message"] = "<h2 style='color: red'>No Image Selected for Deletion</h2>";
        header('Location: dashboard.php');
        die();
    } else {
        $imageId = $_GET["id"];

        $db = new PDO("mysql:host=localhost;dbname=katelynn96_ei4", "katelynn96_ei4", "A62lRDdr9n");
        
        $stmt = $db->prepare("DELETE FROM images WHERE id=:imageId");

        if($stmt->execute(array("imageId" => $imageId))) {
            $rowNum = $stmt->rowCount();

            if($rowNum >= 1) {
                if(unlink($_GET["file"])) {
                    $_SESSION["message"] = "<h2 style='color: green'>Image deleted!</h2>";
                    header('Location: dashboard.php');

                    $db = null;
                    die();
                } else {
                    $_SESSION["message"] = "<h2 style='color: yellow'>Image deleted from database, but not from files!</h2>";
                    header('Location: dashboard.php');

                    $db = null;
                    die();
                }
            } else {
                $_SESSION["message"] = "<h2 style='color: red'>Failed deletion!</h2>";
                header('Location: dashboard.php');

                $db = null;
                die();
            }
        }

        $db = null;
    }
?>