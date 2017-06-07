<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoExmDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-exm-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'exminfo_exmid')->textInput() ?>

    <?= $form->field($model, 'exminfo_course')->textInput() ?>

    <?= $form->field($model, 'exminfo_type')->textInput() ?>

    <?= $form->field($model, 'exminfo_degree')->textInput() ?>

    <?= $form->field($model, 'exminfo_hour')->textInput() ?>

    <?= $form->field($model, 'exminfo_stdamount')->textInput() ?>

    <?= $form->field($model, 'exminfo_fee')->textInput() ?>

    <?= $form->field($model, 'exminfo_note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
