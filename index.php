<?php
    require('controller.php');

    if(isset($_GET['action'])){
        if($_GET['action'] == "listPosts"){
            listPosts();
        }
        elseif ($_GET['action'] == "post"){
            post();
        }
    }
