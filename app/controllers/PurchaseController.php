<?php

namespace App\controllers;

use App\models\PurchaseModel;

class PurchaseController
{
    private PurchaseModel $purchaseModel;
    public function __construct()
    {
        $this->purchaseModel = new PurchaseModel();
    }

    public function purchaseHandler()
    {
        $id_watch = $_REQUEST['id_watch'];
        $disponibile = false;
        if (isset($_SESSION['id_utente'])) {
            $id_utente = intval($_SESSION['id_utente']);

            $this->purchaseModel->setID_watch($id_watch);
            $this->purchaseModel->setID_utente($id_utente);
            $this->purchaseModel->setDisponibile($disponibile);

            $response = $this->purchaseModel->purchase();
            switch ($response) {
                case 'ADDED':
                    $response = $this->purchaseModel->sold();
                    header("location:home");
                    break;

                case 'ERROR':
                    break;
            }
        }else{
            header("location:login");
        }
    }

    public function seePurchases()
    {
        $response = $this->purchaseModel->seePurchases();
        echo json_encode($response);
    }
}

?>