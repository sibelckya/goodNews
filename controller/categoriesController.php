<?php

include_once('model/categoriesModel.php');

class categoriesController
{


    private $model;

    public function __construct()
    {
        $this->model = new categoriesModel;
    }

    public function getCategories()
    {
      return  $this->model->getCategories(); // tableaux

    //    include('view/menu.php');
    }



}