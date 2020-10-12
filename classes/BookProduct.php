<?php
namespace classes;


class BookProduct extends ShopProduct
{
    private $numPages;
    
    public function __construct($title, $firstName, $mainName, $price, $numPages = 0)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPages;
    }
    public function getNumberOfPages()
    {
        return $this->numPages;
    }
    public function getSummaryLine()
    {
        $base = parent::getSummaryLine();
        $base .= ": $this->numPages стр.";
        return $base;
    }
    public function getPrice()
    {
        return $this->price;
    }
}



