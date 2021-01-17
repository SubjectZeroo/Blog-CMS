<?php

if(isset($_POST['create_category'])){

    App::get('database')->insert('categories',[
    
        'category_title' => $_POST['category_title']
       
        ]);
      
        header("Location: /table-categories"); 
} 
