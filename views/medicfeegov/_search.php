<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoMfgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-mfg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fid') ?>

    <?= $form->field($model, 'mfg_ucheck') ?>

    <?= $form->field($model, 'mfg_spname') ?>

    <?= $form->field($model, 'mfg_spid') ?>

    <?= $form->field($model, 'mfg_dadname') ?>

    <?php // echo $form->field($model, 'mfg_dadid') ?>

    <?php // echo $form->field($model, 'mfg_momname') ?>

    <?php // echo $form->field($model, 'mfg_momid') ?>

    <?php // echo $form->field($model, 'mfg_chname') ?>

    <?php // echo $form->field($model, 'mfg_chid') ?>

    <?php // echo $form->field($model, 'mfg_chbirth') ?>

    <?php // echo $form->field($model, 'mfg_chorder') ?>

    <?php // echo $form->field($model, 'mfg_chstatus') ?>

    <?php // echo $form->field($model, 'mfg_ill') ?>

    <?php // echo $form->field($model, 'mfg_hospital') ?>

    <?php // echo $form->field($model, 'mfg_hospitaltype') ?>

    <?php // echo $form->field($model, 'mfg_hosbdate') ?>

    <?php // echo $form->field($model, 'mfg_hosedate') ?>

    <?php // echo $form->field($model, 'mfg_hosfee') ?>

    <?php // echo $form->field($model, 'mfg_recnum') ?>

    <?php // echo $form->field($model, 'mfg_feeright') ?>

    <?php // echo $form->field($model, 'mfg_amount') ?>

    <?php // echo $form->field($model, 'mfg_info') ?>

    <?php // echo $form->field($model, 'mfg_uright') ?>

    <?php // echo $form->field($model, 'mfg_relright') ?>

    <?php // echo $form->field($model, 'mfg_date') ?>

    <?php // echo $form->field($model, 'mfg_stid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
