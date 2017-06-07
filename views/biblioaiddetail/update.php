<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoLibraidetail */

$this->title = 'Update Form Auto Libraidetail: ' . $model->libraidet_id;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Libraidetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->libraidet_id, 'url' => ['view', 'id' => $model->libraidet_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="form-auto-libraidetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
