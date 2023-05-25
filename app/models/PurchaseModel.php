<?php

namespace App\models;

class PurchaseModel
{
    private $connection;
    protected int $id;
    protected int $id_utente;
    protected int $id_watch;
    protected bool $disponibile;
    //protected DateTimeInterface $purchase_date;

    public function __construct()
    {
        $this->connection = new \mysqli('127.0.0.1', 'root', '', 'watchapp');
    }

    public function setID(int $id): void
    {
        $this->id = $id;
    }

    public function setID_utente(int $id_utente): void
    {
        $this->id_utente = $id_utente;
    }

    public function setID_watch(int $id_watch): void
    {
        $this->id_watch = $id_watch;
    }

    public function setDisponibile(bool $disponibile): void
    {
        $this->disponibile = $disponibile;
    }
    public function getID(): int
    {
        return $this->id;
    }
    public function getID_utente(): int
    {
        return $this->id_utente;
    }
    public function getID_watch(): int
    {
        return $this->id_watch;
    }
    public function getDisponibile(): bool
    {
        return $this->disponibile;
    }

    public function purchase()
    {
        //carica sulla tabella purchase
        $query = "INSERT INTO purchase (id_watch, id_utente) VALUES (?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ii", $this->id_watch, $this->id_utente);
        if ($stmt->execute() == true) {
            return "ADDED";
        } else {
            return "ERROR";
        }
    }

    public function sold()
    {
        $query = "UPDATE watch SET disponibile=? WHERE id_watch=?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ii", $this->disponibile, $this->id_watch); 
        $stmt->execute();  
    }

    public function seePurchases(): array
    {
        $row = array();
        $finalresult = array();
        $i = 0;
        $query = "SELECT * FROM purchase join watch ON purchase.id_watch=watch.id_watch JOIN user ON purchase.id_utente=user.id_utente JOIN model ON watch.id_model=model.id_model JOIN brand ON watch.id_brand=brand.id_brand";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
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