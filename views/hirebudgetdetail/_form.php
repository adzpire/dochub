<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FormAutoHirbdgtdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-hirbdgtdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hbdgtdet_hbid')->textInput() ?>

    <?= $form->field($model, 'hbdgtdet_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hbdgtdet_amount')->textInput() ?>

    <?= $form->field($model, 'hbdgtdet_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hbdgtdet_xpecprice')->textInput() ?>

    <?= $form->field($model, 'hbdgtdet_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
