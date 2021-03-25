<?php


namespace App\Data;


use App\Entity\Categorie;
use Doctrine\ORM\Mapping as ORM;

class SearchData
{

    public  $q = '';


    public  $categories = [];

    public $max;

    public $min;
}