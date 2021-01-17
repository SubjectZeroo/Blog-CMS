<?php

// $id = isset($_GET['approved'])?:$_POST['unapproved'];

if(isset($_GET['approved']))
{
    $id = $_GET['approved'];
}else {
    $id = $_GET['unapproved'];
}

if($_GET['name'] == 'approved')
{
    $status = $_GET['name'];
}else {
    $status = $_GET['name'];
}


App::get('database')->updateComment($status,$id);     
header("Location: /table-comments");
