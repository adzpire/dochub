<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FormAutoHirbdgtdetail */

$this->title = 'Create Form Auto Hirbdgtdetail';
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Hirbdgtdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-hirbdgtdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
