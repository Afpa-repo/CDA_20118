<?php


namespace App\Data;


use App\Entity\Categorie;

class SearchData
{

    /**
     * @Var string
     */
    public  $q = '';

     /**
     * @Var Categorie[]
    */
    public  $categories = [];

    /**
     * @Var null|integer
     */
    public $max;

    /**
     * @Var null|integer
     */
    public $min;
}