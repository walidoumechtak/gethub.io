<?php 
    include "functions.php";
    include "includes/connexion.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="themes/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="themes/css/all.min.css">
    <link rel="stylesheet" href="themes/css/footer.css">
    <?php if(isset($includeIndexCss)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/index.css">
    <?php } ?>
    <?php if(isset($includeLoginCss)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/login.css">
    <?php } ?>
    <?php if(isset($includeForgetCss)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/forget.css">
    <?php } ?>
    <?php if(isset($includeregistreCss)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/register.css">
    <?php } ?>
    <?php if(isset($includeBooks)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/books.css">
    <?php } ?>
    <?php if(isset($includeNav)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/nav.css">
    <?php } ?>
    <?php if(isset($includeAbout)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/about.css">
    <?php } ?>
    <?php if(isset($includeBlog)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/blog.css">
    <?php } ?>
    <?php if(isset($includeContact)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/contact.css">
    <?php } ?>
    <?php if(isset($includeShoping)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/shoping.css">
    <?php } ?>
    <?php if(isset($includeProuctPage)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/product-page.css">
    <?php } ?>
    <?php if(isset($includeSearch)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/search-page.css">
    <?php } ?>
    <?php if(isset($includeblogPage)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/blog-page.css">
    <?php } ?>
    <?php if(isset($includeEdite_user)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/user-profile.css">
    <?php } ?>
    <?php if(isset($includeEdite_user_form)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/user-profile-edit-form.css">
    <?php } ?>
    <?php if(isset($includeChangePaa)){?>
      <link rel="stylesheet" type="text/css" href="themes/css/ChangePass.css">
    <?php } ?>
    
    <link rel="stylesheet" type="text/css" href="themes/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="themes/css/owl.theme.default.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <script src="themes/js/jquery-3.6.0.min.js"></script>
    <title><?php gettitle(); ?></title>


    <style>
      body{
        font-family: 'Roboto', sans-serif;
       }
    </style>
</head>
<body>
    