<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoExmDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-exm-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'exminfo_id') ?>

    <?= $form->field($model, 'exminfo_exmid') ?>

    <?= $form->field($model, 'exminfo_course') ?>

    <?= $form->field($model, 'exminfo_type') ?>

    <?= $form->field($model, 'exminfo_degree') ?>

    <?php // echo $form->field($model, 'exminfo_hour') ?>

    <?php // echo $form->field($model, 'exminfo_stdamount') ?>

    <?php // echo $form->field($model, 'exminfo_fee') ?>

    <?php // echo $form->field($model, 'exminfo_note') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
