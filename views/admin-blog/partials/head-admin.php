<?php ob_start(); ?>
<?php session_start(); ?>
<?php

// if(!isset($_SESSION['user_role'])){
//     // if($_SESSION['user_role'] !== 'admin'){
//         header("Location: ../index.php");
//     // }
//  } 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mini - CRM</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
    <link rel="stylesheet" href="/public/sb-admin.css">
    <!-- Custom Fonts -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="/admin/js/scripts.js"></script>
</head>

<body>
<?php include  "navigation-admin.php"?>
    <div class="wrapper">
        <div class="">
            <?php include  "sidebar-admin.php"?>
            <main id="wrapper" class="main"> 