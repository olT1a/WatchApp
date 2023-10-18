<?php

namespace App\models;

class WatchModel
{
    private $connection;
    private int $id;
    private string $case_size;
    private float $price;
    private string $condition;
    private string $img;
    private bool $disponibile;
    private int $id_model;
    private int $id_brand;
    private int $id_user;
    private int $id_venditore;

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
    public function setDisponibile(bool $disponibile): void
    {
        $this->disponibile = $disponibile;
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

    public function setID_venditore(int $id_venditore): void
    {
        $this->id_venditore = $id_venditore;
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
    public function getID_venditore(): int
    {
        return $this->id_venditore;
    }
    public function getImg(): string
    {
        return $this->img;
    }

    public function getDisponibile(): bool
    {
        return $this->disponibile;
    }

    public function findBrand(): array
    {
        $row = array();
        $finalresult = array();
        $i = 0;
        $this->connection->begin_transaction();
        try {
            $query = 'SELECT * FROM brand';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $this->connection->commit();
        } catch (\mysqli_sql_exception $exception) {
            $this->connection->rollback();
        }
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
        $this->connection->begin_transaction();
        try {
            $query = "SELECT * FROM model WHERE id_brand=?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $brandName);
            $stmt->execute();
            $result = $stmt->get_result();
            $this->connection->commit();
        } catch (\mysqli_sql_exception $exception) {
            $this->connection->rollback();
        }
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
        $this->connection->begin_transaction();
        try {
            $query = "SELECT * FROM model WHERE id_model=?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $modelName);
            $stmt->execute();
            $result = $stmt->get_result();
            $this->connection->commit();
        } catch (\mysqli_sql_exception $exception) {
            $this->connection->rollback();
        }
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
        $this->connection->begin_transaction();
        try{
            $query = "INSERT INTO watch (price, watch_condition, img, disponibile, id_venditore, id_model, id_brand) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("dssiiii", $this->price, $this->condition, $this->img, $this->disponibile, $this->id_venditore, $this->id_model, $this->id_brand);
            $stmt->execute();
            $this->connection->commit();
            return "ADDED";
        }catch(\mysqli_sql_exception $exception){
            $this->connection->rollback();
            return "ERROR";
        }
        
    }

    public function watch(): array
    {
        $row = array();
        $finalresult = array();
        $i = 0;
        $this->connection->begin_transaction();
        try {
            $query = "SELECT * FROM watch join model ON watch.id_model=model.id_model JOIN brand ON watch.id_brand=brand.id_brand JOIN user ON watch.id_venditore=user.id_utente";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $this->connection->commit();
        } catch (\mysqli_sql_exception $exception) {
            $this->connection->rollback();
        }
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