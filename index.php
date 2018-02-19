<?php 
class ShopProduct
{
    public $title             = "Стандартный товар";
    public $producerMainName  = "Булгаков";
    public $producerFirstName = "Михаил";
    public $price             = 5.99;
    
    function __construct($title, $producerMainName, $producerFirstName, $price)
    {
        $this->title             = $title;
        $this->producerMainName  = $producerMainName;
        $this->producerFirstName = $producerFirstName;
        $this->price             = $price;
    }
    function getProducer()
    {
        return  "{$this->producerFirstName} "
               ."{$this->producerMainName}\n";
    }
}
$product1 = new ShopProduct("Собачье сердце", "Булгаков", "Михаил", 5.99);

//print "Автор: {$product1->getProducer()} <br> ";

class AddressManager
{
    private $addresses = array("209.131.36.159", "74.125.19.106");
    
    function outputAddresses($resolve)
    {
        foreach ($this->addresses as $address)
        {
            print $address;
            
            if(is_string($resolve))
            {
                $resolve =
                (preg_match("/false|no|off/i", $resolve))?
                false:true;               
            }
            if($resolve)
            {
                print "---( ".gethostbyaddr($address)." )";
            }                
            print "\n";
        }
       
    }
}
//$settings = simplexml_load_file("settings.xml");
//$manager = new AddressManager();
//var_dump($settings->resolvedomains);exit;
//$manager->outputAddresses((string)$settings->resolvedomains);


?>
