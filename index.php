<?php 
function __autoload( $className ) {
  $className = str_replace( "..", "", $className );
  require_once( "classes/$className.php" );
  echo "Loaded classes/$className.php<br>";
}


$product1 = new BookProduct("Собачье сердце", "Михаил","Булгаков", 5.99, 40);
$writer = new ShopProductWriter();
$writer->addProduct($product1);
$writer->write($product1);
//$product1 = new ShopProduct("Собачье сердце", "Булгаков", "Михаил", 5.99);

//print "Автор: {$product1->getProducer()} <br> ";

/*class AddressManager
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
}*/
//$settings = simplexml_load_file("settings.xml");
//$manager = new AddressManager();
//var_dump($settings->resolvedomains);exit;
//$manager->outputAddresses((string)$settings->resolvedomains);


?>
