<?php

namespace app\controllers;


use yii\rest\ActiveController;
use yii\web\Response;

/**
 * ItemCategoryController implements the CRUD actions for ItemCategory model.
 */
class ItemCategoryRestController extends ActiveController
{
    public $modelClass = 'app\models\ItemCategory';

    public function beforeAction($action)
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }
}

