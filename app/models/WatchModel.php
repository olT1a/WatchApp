<?php

namespace App\models;

class WatchModel
{
    private $connection;
    protected int $id;
    protected string $case_size;
    protected float $price;
    protected string $condition;
    protected string $img;
    protected int $id_model;
    protected int $id_brand;
    protected int $id_user;

    public function __construct()
    {
        $this->connection = new \mysqli('127.0.0.1', 'root', '', 'watchapp');
    }

    public function setID(int $id): void
    {
        $this->id = $id;
    }

    public function setCasesize(string $case_size): void
    {
        $this->case_size = $case_size;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setCondition(string $condition): void
    {
        $this->condition = $condition;
    }

    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    public function setID_model(int $id_model): void
    {
        $this->id_model = $id_model;
    }

    public function setID_brand(int $id_brand): void
    {
        $this->id_brand = $id_brand;
    }

    public function setID_user(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getCasesize(): string
    {
        return $this->case_size;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function getID_model(): int
    {
        return $this->id_model;
    }

    public function getID_brand(): int
    {
        return $this->id_brand;
    }
    public function getID_user(): int
    {
        return $this->id_user;
    }
    public function getImg(): string
    {
        return $this->img;
    }

    public function findBrand(): array
    {
        $row = array();
        $finalresult = array();
        $i = 0;
        $query = 'SELECT * FROM brand';
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $finalresult[$i] = $row;
                $i++;
            }
            return $finalresult;
        } else {
            return array('message' => 'error');
        }
    }

    public function findModel(): array
    {
        $row = array();
        $finalresult = array();
        $i = 0;
        $brandName = $_POST['brandName'];
        $query = "SELECT * FROM model WHERE id_brand='$brandName'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $finalresult[$i] = $row;
                $i++;
            }
            return $finalresult;
        } else {
            return array('message' => 'error');
        }

    }

    public function findReference(): array
    {
        $row = array();
        $finalresult = array();
        $i = 0;
        $modelName = $_POST['modelName'];
        $query = "SELECT * FROM model WHERE id_model='$modelName'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $finalresult[$i] = $row;
                $i++;
            }
            return $finalresult;
        } else {
            return array('message' => 'error');
        } 
    }
    
    
    public function uploadsale(): string
    {
        /*$img = $_FILES['img']['name'];
        $tmp_img = $_FILES['img']['tmp_name'];
        $folder = "./img/" . $img;*/
        $query = "INSERT INTO watch (id_watch,price, watch_condition, img, id_model, id_brand, id_utente) VALUES (null, '$this->price', '$this->condition', '$this->img', '$this->id_model', '$this->id_brand', '$this->id_user')";
        if($this->connection->query($query) === true){
            return "ADDED";
        } else{
            return "ERROR";
        }   
    }

    public function watch(): array
    {
        $row = array();
        $finalresult = array();
        $i = 0;
        $query = "SELECT * FROM watch";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $finalresult[$i] = $row;
                $i++;
            }
            return $finalresult;
        } else {
            return array('message' => 'error');
        } 
    }

}

?>