<?php

namespace App\Data;

use App\Entity\Category;

class SearchData
{
    /**
     * @var string
     */
    public $q =''; //keyword


    /**
     * @var null|float
     */
    public $max;

    /**
     * @var null|float
     */
    public $min;

    /**
     * @var boolean
     */
    public $promo = false;

    public $category = [];
}