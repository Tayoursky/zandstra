<?php 
class ShopProduct
{
    public $title             = "Стандартный товар";
    public $producerMainName  = "Булгаков";
    public $producerFirstName = "Михаил";
}
$product1 = new ShopProduct();
//$product2 = new ShopProduct();
$product1->title             = "Собачье сердце"; 
$product1->producerMainName  = "Булгаков";
$product1->producerFirstName = "Михаил";
$product1->price             = 5.99;

print "Автор: {$product1->producerFirstName} "
      ."{$product1->producerMainName}\n";
//print $product2->title="Ревизор";
?>