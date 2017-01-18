<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoBrmnSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-brmn-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'brmn_id') ?>

    <?= $form->field($model, 'brmn_stid') ?>

    <?= $form->field($model, 'brmn_salary') ?>

    <?= $form->field($model, 'brmn_borrow') ?>

    <?= $form->field($model, 'brmn_choice') ?>

    <?php // echo $form->field($model, 'brmn_other') ?>

    <?php // echo $form->field($model, 'brmn_title') ?>

    <?php // echo $form->field($model, 'brmn_place') ?>

    <?php // echo $form->field($model, 'brmn_bdate') ?>

    <?php // echo $form->field($model, 'brmn_edate') ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('search').' '.Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Html::icon('refresh').' '.Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
