<?php

namespace App\controllers;

use App\models\WatchModel;

class WatchController
{
    private WatchModel $watchModel;

    public function __construct()
    {
        $this->watchModel = new WatchModel();
    }

    public function brandHandler()
    {
        $response = $this->watchModel->findBrand();
        echo json_encode($response);
    }

    public function modelHandler()
    {
        $response = $this->watchModel->findModel();
        echo json_encode($response);
    }

    public function referenceHandler()
    {
        $response = $this->watchModel->findReference();
        echo json_encode($response);
    }

    public function saleHandler()
    {        
        $img = $_FILES['img'];
        $folder = "./img/{$img['name']}"; 
        move_uploaded_file($img['tmp_name'], $folder);
        $watch_condition = $_POST['condition'];
        $price = $_POST['price'];
        $id_user = intval($_SESSION['id_utente']);
        $id_brand = intval($_POST['id_brand']);
        $id_model = intval($_POST['id_model']);
        $disponibile = true;

        $this->watchModel->setPrice($price);
        $this->watchModel->setID_user($id_user);
        $this->watchModel->setID_brand($id_brand);
        $this->watchModel->setID_model($id_model);
        $this->watchModel->setImg($img['name']);
        $this->watchModel->setCondition($watch_condition);
        $this->watchModel->setDisponibile($disponibile);
        
       $response = $this->watchModel->uploadsale();
       switch($response)
       {
            case "ADDED":
                header("location: home");
                break;

            case "ERROE":
                echo "no";  
                break;
       }
    }

    public function watchHandler()
    {
        $response = $this->watchModel->watch();
        echo json_encode($response);
    }

}





?>
