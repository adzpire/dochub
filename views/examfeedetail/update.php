<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoExmDetail */

$this->title = 'Update Form Auto Exm Detail: ' . $model->exminfo_id;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Exm Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->exminfo_id, 'url' => ['view', 'id' => $model->exminfo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="form-auto-exm-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
