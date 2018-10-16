<?php

    session_start();
    $customerID = $_SESSION['cus_id'];
    echo $customerID;
?>