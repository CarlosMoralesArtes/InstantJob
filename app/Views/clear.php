<?php
    $session = session();
    $session ->destroy();
    header('Location: ./index');
    exit();
?>