<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoExmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-exm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'exmmain_id') ?>

    <?= $form->field($model, 'exmmain_semester') ?>

    <?= $form->field($model, 'exmmain_year') ?>

    <?= $form->field($model, 'exmmain_stid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
