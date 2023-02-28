<?php

session_start();
    include_once('model/bdd.php');

    include_once('controller/articlesController.php');
    include_once('controller/categoriesController.php');
    include_once('controller/usersController.php');

    
    $categories = new categoriesController;
    $menu = $categories->getCategories();

    include('view/header.php');
    include('controller/route.php');
    include('view/footer.php');
    
