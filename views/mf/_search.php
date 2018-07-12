<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormMf2016Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-mf2016-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fid') ?>

    <?= $form->field($model, 'mf_stid') ?>

    <?= $form->field($model, 'mf_ill') ?>

    <?= $form->field($model, 'mf_hospital') ?>

    <?= $form->field($model, 'mf_want') ?>

    <?php // echo $form->field($model, 'mf_choice') ?>

    <?php // echo $form->field($model, 'mf_date') ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('search').' '.'Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Html::icon('refresh').' '.'Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
