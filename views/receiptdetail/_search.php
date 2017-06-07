<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoRcdetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-rcdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rcd_id') ?>

    <?= $form->field($model, 'rcd_rcid') ?>

    <?= $form->field($model, 'rcd_detail') ?>

    <?= $form->field($model, 'rcd_amount') ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('search').' '.'Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Html::icon('refresh').' '.'Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
