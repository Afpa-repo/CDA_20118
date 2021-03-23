<?php


namespace App\Entity;


class ArticleSearch
{
    /*
     * @var int|null
     */
    private $maxprice;

    /*
    * @var int|null
    */
    private $minprice;

    /**
     * @return mixed
     */
    public function getMaxprice(): ?int
    {
        return $this->maxprice;
    }

    /**
     * @param int|null $maxprice
     * @return ArticleSearch
     */
    public function setMaxprice(int $maxprice) : ArticleSearch
    {
        $this->maxprice = $maxprice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMinprice(): ?int
    {
        return $this->minprice;
    }

    /**
     * @param int|null $minprice
     * @return ArticleSearch
     */
    public function setMinprice(int $minprice): ArticleSearch
    {
        $this->minprice = $minprice;
        return $this;
    }

}