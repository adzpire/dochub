<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUsebdgtdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-usebdgtdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usebdgtdet_ubid')->textInput() ?>

    <?= $form->field($model, 'usebdgtdet_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usebdgtdet_amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
