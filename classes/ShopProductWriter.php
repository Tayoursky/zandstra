<?php
namespace classes;


abstract class ShopProductWriter
{
    protected $products = array();
    
    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }
    abstract public function write();
    /*{
        $str = "";
        foreach($this->products as $shopProduct)
        {
            $str .= "{$shopProduct->title}: ";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->price})\n";
            
        }
        print $str;
        
    }*/
    
}


?>
