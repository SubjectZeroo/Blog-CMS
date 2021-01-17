<?php

$category_id = $_GET['delete'];
App::get('database')->delete('categories','category_id',$category_id); 
header("Location: /table-categories");