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

}





?>