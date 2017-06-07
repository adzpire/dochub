<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoLibraidetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-libraidetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'libraidet_id') ?>

    <?= $form->field($model, 'libraidet_mainid') ?>

    <?= $form->field($model, 'libraidet_org') ?>

    <?= $form->field($model, 'libraidet_recptno') ?>

    <?= $form->field($model, 'libraidet_amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
