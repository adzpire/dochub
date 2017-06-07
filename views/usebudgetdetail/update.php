<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUsebdgtdetail */

$this->title = 'Update Form Auto Usebdgtdetail: ' . $model->usebdgtdet_id;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Usebdgtdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usebdgtdet_id, 'url' => ['view', 'id' => $model->usebdgtdet_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="form-auto-usebdgtdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
