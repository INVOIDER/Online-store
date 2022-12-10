<?php
    $db = mysqli_connect ("onlineshop","root");
    mysqli_select_db ($db,"mybase");
    mysqli_query($db, "SET NAMES utf8");