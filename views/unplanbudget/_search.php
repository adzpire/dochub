<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUnplnbdgtSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-unplnbdgt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'unpbdgt_stid') ?>

    <?= $form->field($model, 'unpbdgt_date') ?>

    <?= $form->field($model, 'unpbdgt_job') ?>

    <?= $form->field($model, 'unpbdgt_material') ?>

    <?php // echo $form->field($model, 'unpbdgt_reason') ?>

    <?php // echo $form->field($model, 'unpbdgt_tax') ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('search').' '.Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Html::icon('refresh').' '.Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
