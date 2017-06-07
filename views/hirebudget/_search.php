<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FormAutoHirbdgtSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-hirbdgt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'hbdgt_id') ?>

    <?= $form->field($model, 'hbdgt_stid') ?>

    <?= $form->field($model, 'hbdgt_date') ?>

    <?= $form->field($model, 'hbdgt_job') ?>

    <?= $form->field($model, 'hbdgt_org') ?>

    <?php // echo $form->field($model, 'hbdgt_reason') ?>

    <?php // echo $form->field($model, 'hbdgt_tax') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
