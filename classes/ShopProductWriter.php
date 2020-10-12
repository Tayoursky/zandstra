<?php
namespace classes;


class ShopProductWriter
{
    private $products = array();
    
    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }
    public function write(){
        $str = "";
        foreach($this->products as $shopProduct)
        {
            $str .= "{$shopProduct->title}: ";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->price})\n";
            
        }
        print $str;
        
    }
    
}


?>
