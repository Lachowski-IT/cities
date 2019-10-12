<?php

namespace app\controllers;

use app\models\City;
use yii\helpers\Json;

class CityController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index', array());
    }

    public function actionList($name = "")
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $cities['data'] = City::getCities($name);
        return json_encode($cities);
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
