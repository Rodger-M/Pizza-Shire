<?php
    if (isset($_POST['entrar'])) {
        include 'loginphp.php';
    }
    elseif (isset($_POST['cadastrar'])) {
        include 'registrophp.php';
    }
?>