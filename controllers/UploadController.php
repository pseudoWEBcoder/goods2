<?php

namespace app\controllers;

use app\models\UploadForm;

class UploadController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new UploadForm();
        $model->scandir();
        if ($model->load(\Yii::$app->request->post()))
            $model->upload();
        return $this->render('index', ['model' => $model]);
    }

}
