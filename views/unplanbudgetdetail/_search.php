<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUnplnbdgtdetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-unplnbdgtdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'unpbdgtdet_unpbid') ?>

    <?= $form->field($model, 'unpbdgtdet_title') ?>

    <?= $form->field($model, 'unpbdgtdet_amount') ?>

    <?= $form->field($model, 'unpbdgtdet_unit') ?>

    <?php // echo $form->field($model, 'unpbdgtdet_xpecprice') ?>

    <?php // echo $form->field($model, 'unpbdgtdet_price') ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('search').' '.Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Html::icon('refresh').' '.Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
