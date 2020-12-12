<?php
    session_start();
    session_destroy();
    echo "<script>window.location ='http://localhost:8080/ritik/election%20website/index.php';</script>";
?>