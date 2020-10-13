<?php 
/*function __autoload( $className ) {
  $className = str_replace( "..", "", $className );
  require_once( "classes/$className.php" );
  echo "Loaded classes/$className.php<br>";
}*/

ini_set('display_errors', 1);
error_reporting(E_ALL);

use classes\BookProduct;
use classes\ShopProductWriter;

define('ROOT', dirname(__DIR__) . '/zandstra');

spl_autoload_register(function ($className) {
  $file = ROOT . '/' . str_replace('\\', '/', $className). '.php';
  if (is_file($file))
    include_once $file;
});

$db = new \PDO('mysql:host=localhost;dbname=zandstra;charset=utf8', 'root', '5Maz8UXF', array(
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
));

$product1 = new BookProduct("Собачье сердце", "Михаил","Булгаков", 5.99, 40);
$writer = new ShopProductWriter();
$writer->addProduct($product1);
//$writer->write($product1);
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
