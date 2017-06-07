<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoLibraidSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-libraid-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'libaid_id') ?>

    <?= $form->field($model, 'libaid_stid') ?>

    <?= $form->field($model, 'libaid_date') ?>

    <?= $form->field($model, 'libaid_year') ?>

    <?= $form->field($model, 'libaid_reqamount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
