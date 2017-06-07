<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FormAutoHirbdgtdetail */

$this->title = 'Update Form Auto Hirbdgtdetail: ' . $model->hbdgtdet_id;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Hirbdgtdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hbdgtdet_id, 'url' => ['view', 'id' => $model->hbdgtdet_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="form-auto-hirbdgtdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
