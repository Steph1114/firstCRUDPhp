<?php
    include ('view/head.php');


    //Loc = vue souhaiter de l'user
    $loc = filter_input(INPUT_GET, "loc", FILTER_SANITIZE_STRING);

    switch ($loc) {

        case 'index':
          include("view/index_content.php");
          break;

        case 'add':
          include("view/add_content.php");
          break;

        case 'read':
          include("controller/C_read.php");
          include("view/read_content.php");
          break;

        case 'update':
          include("view/update_content.php");
          break;

        case 'delete':
          include("controller/C_delete.php");
          include("view/delete_content.php");
          break;

        default;
          include("view/content/404.php");
          break;              
    }
