<?php
$categories = App::get('database')->selectAll('categories');



require 'views/admin-blog/table_categories.view.php';