<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUsebdgtSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-usebdgt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usebdgt_id') ?>

    <?= $form->field($model, 'usebdgt_stid') ?>

    <?= $form->field($model, 'usebdgt_date') ?>

    <?= $form->field($model, 'usebdgt_year') ?>

    <?= $form->field($model, 'usebdgt_reason') ?>

    <?php // echo $form->field($model, 'usebdgt_bookno') ?>

    <?php // echo $form->field($model, 'usebdgt_bookdate') ?>

    <?php // echo $form->field($model, 'usebdgt_headcmitt') ?>

    <?php // echo $form->field($model, 'usebdgt_frstcmitt') ?>

    <?php // echo $form->field($model, 'usebdgt_scndcmitt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
