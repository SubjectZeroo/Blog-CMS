<?php require_once  'config/app.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DevPost - Blog Tecnológico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
    <link rel="stylesheet" href="/view/css/blog-post.css">
   
</head>
<body>
    <?php include APP_PATH ."/view/includes/navigation.php";?>
    <div class="container is-widescreen">
        
            <div class="infobar">
                <div class="section-search my-3">
                            <!-- <h4 class="title">Blog Search</h4> -->
                          
                              
                                    <div class="field has-addons">
                                        <div class="control ">
                                             <form action="/search.view.php" method="POST">
                                                <input style="width: 20em;" placeholder="¿No lo consigues? Búscalo aquí" name="search" type="text" class="input  is-rounded">
                                            </form>   
                                        </div>
                                        <div class="control">
                                            <button aria-label="buscar" name="submit" class="btn button is-info is-rounded" type="submit">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>        
                                                    
                </div> 
            </div>
            <div class="tile is-ancestor mt-1">