<?php

namespace App\models;

class WatchModel
{
    private $connection;
    protected int $id;
    protected string $case_size;
    protected float $price;
    protected string $condition;
    protected int $id_model;
    protected int $id_brand;

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

    public function setID_model(int $id_model): void
    {
        $this->id_model = $id_model;
    }

    public function setID_brand(int $id_brand): void
    {
        $this->id_brand = $id_brand;
    }

    public function getID(int $id): int
    {
        return $this->id;
    }

    public function getCasesize(string $case_size): string
    {
        return $this->case_size;
    }

    public function getPrice(float $price): float
    {
        return $this->price;
    }

    public function getCondition(string $condition): string
    {
        return $this->condition;
    }

    public function getID_model(int $id_model): int
    {
        return $this->id_model;
    }

    public function getID_brand(int $id_brand): int
    {
        return $this->id_brand;
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

}

?>