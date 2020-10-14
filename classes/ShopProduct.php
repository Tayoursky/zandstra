<?php
namespace classes;


class ShopProduct implements Chargeable
{
    private $id = 0;
    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price;
    private $discount = 0;
    
    function __construct($title, $firstName, $mainName, $price)
    {
        $this->title             = $title;
        $this->producerMainName  = $mainName;
        $this->producerFirstName = $firstName;
        $this->price             = $price;
    }

    public function setID(int $id)
    {
        $this->id = $id;
    }

    public function getProducerFirstName()
    {
        return $this->producerFirstName;
    }
    public function getProducerMainName()
    {
        return $this->producerMainName;
    }
    public function setDiscount(int $num)
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

    public function getPrice(): float
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
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        return $base;
    }

    public static function getInstance (int $id, \PDO $pdo): ?ShopProduct
    {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();

        if (empty($row)) {
            return null;
        }
        if ($row['type'] == "book") {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
        (float) $row['price'],
          (int) $row['numpages']
            );
        } elseif ($row['type'] == "cd") {
            $product = new CDProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
        (float) $row['price'],
          (int) $row['playlength']
            );
        } else {
            $firstname = (is_null($row['firstname'])) ? "" : $row['firstname'];
            $product = new ShopProduct(
                $row['title'],
                $firstname,
                $row['mainname'],
        (float) $row['price']
            );
        }
        $product->setID((int) $row['id']);
        $product->setDiscount((int) $row['discount']);
        return $product;
    }
    
    
}



?>
