<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoLibraidetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-libraidetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'libraidet_mainid')->textInput() ?>

    <?= $form->field($model, 'libraidet_org')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'libraidet_recptno')->textInput() ?>

    <?= $form->field($model, 'libraidet_amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
