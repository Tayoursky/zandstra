<?php 
class ShopProduct
{
    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price;
    private $discount =0;
    
    function __construct($title, $firstName, $mainName, $price)
    {
        $this->title             = $title;
        $this->producerMainName  = $mainName;
        $this->producerFirstName = $firstName;
        $this->price             = $price;
    }
    
    public function getProducerFirstName()
    {
        return $this->producerFirstName;
    }
    public function getproducerMainName()
    {
        return $this->producerMainName;
    }
    public function setDiscount($num)
    {
        $this->discount = $num;
    }
    public function getDiscount()
    {
        return $this->discount;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getPrice()
    {
        return ($this->price - $this->discount);
    }
    public function getProducer()
    {
        return  "{$this->producerFirstName} "
               ."{$this->producerMainName}\n";
    }
    public function getSummaryLine()
    {
        $base = "{$this->$title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        return $base;
    }
    
    
    
}



?>
