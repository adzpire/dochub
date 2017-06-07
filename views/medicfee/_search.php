<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoMfSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-mf-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fid') ?>

    <?= $form->field($model, 'mf_utelephone') ?>

    <?= $form->field($model, 'mf_ucheck') ?>

    <?= $form->field($model, 'mf_spname') ?>

    <?= $form->field($model, 'mf_dadname') ?>

    <?php // echo $form->field($model, 'mf_momname') ?>

    <?php // echo $form->field($model, 'mf_chname') ?>

    <?php // echo $form->field($model, 'mf_chbirth') ?>

    <?php // echo $form->field($model, 'mf_dadorder') ?>

    <?php // echo $form->field($model, 'mf_momorder') ?>

    <?php // echo $form->field($model, 'mf_chstatus') ?>

    <?php // echo $form->field($model, 'mf_chright') ?>

    <?php // echo $form->field($model, 'mf_repchorder') ?>

    <?php // echo $form->field($model, 'mf_repchname') ?>

    <?php // echo $form->field($model, 'mf_repchbirth') ?>

    <?php // echo $form->field($model, 'mf_repchdeath') ?>

    <?php // echo $form->field($model, 'mf_ill') ?>

    <?php // echo $form->field($model, 'mf_hospital') ?>

    <?php // echo $form->field($model, 'mf_hospitaltype') ?>

    <?php // echo $form->field($model, 'mf_hosbdate') ?>

    <?php // echo $form->field($model, 'mf_hosedate') ?>

    <?php // echo $form->field($model, 'mf_feeright') ?>

    <?php // echo $form->field($model, 'mf_lackfor') ?>

    <?php // echo $form->field($model, 'mf_lackright') ?>

    <?php // echo $form->field($model, 'mf_lackamount') ?>

    <?php // echo $form->field($model, 'mf_fiftyfor') ?>

    <?php // echo $form->field($model, 'mf_fiftyamount') ?>

    <?php // echo $form->field($model, 'mf_year') ?>

    <?php // echo $form->field($model, 'mf_usedto') ?>

    <?php // echo $form->field($model, 'mf_want') ?>

    <?php // echo $form->field($model, 'mf_date') ?>

    <?php // echo $form->field($model, 'mf_stid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
