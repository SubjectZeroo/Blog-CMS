<?php

$comments = App::get('database')->getComments();


require 'views/admin-blog/table_comments.php';