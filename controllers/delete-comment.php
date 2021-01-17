<?php

$comment_id = $_GET['delete'];
App::get('database')->delete('post_comments','id',$comment_id); 
header("Location: /table-comments");