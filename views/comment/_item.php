<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Comment */

?>

<div class="comment">
<?=Html::a(Html::encode($model->text), ['view', 'id' => $model->id]);?>
</div>