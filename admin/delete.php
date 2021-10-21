<?php 
    require 'functions.php';

    if (delete($_GET['id'], $_GET['type']) > 0) {
        echo "<script> alert('" . ucfirst($_GET['type']) . " Successfully Deleted!'); document.location.href = '" . $_GET['type'] . "index.php' </script>";
    }
?>
