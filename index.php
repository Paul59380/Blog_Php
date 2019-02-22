<?php
    require ('model.php');
    $posts = getPosts(); // Must have the same name than the variable in display_home
    require('display_home.php');
