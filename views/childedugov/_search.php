<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoCegSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-ceg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fid') ?>

    <?= $form->field($model, 'ceg_spname') ?>

    <?= $form->field($model, 'ceg_spjobtype') ?>

    <?= $form->field($model, 'ceg_spposition') ?>

    <?= $form->field($model, 'ceg_spbelong') ?>

    <?php // echo $form->field($model, 'ceg_right') ?>

    <?php // echo $form->field($model, 'ceg_feetype') ?>

    <?php // echo $form->field($model, 'ceg_ch1name') ?>

    <?php // echo $form->field($model, 'ceg_ch1birth') ?>

    <?php // echo $form->field($model, 'ceg_ch1dadorder') ?>

    <?php // echo $form->field($model, 'ceg_ch1momorder') ?>

    <?php // echo $form->field($model, 'ceg_ch1reporder') ?>

    <?php // echo $form->field($model, 'ceg_ch1repname') ?>

    <?php // echo $form->field($model, 'ceg_ch1repbirth') ?>

    <?php // echo $form->field($model, 'ceg_ch1repdeath') ?>

    <?php // echo $form->field($model, 'ceg_ch1schl') ?>

    <?php // echo $form->field($model, 'ceg_ch1schlamphur') ?>

    <?php // echo $form->field($model, 'ceg_ch1schlprovince') ?>

    <?php // echo $form->field($model, 'ceg_ch1schlclass') ?>

    <?php // echo $form->field($model, 'ceg_ch1fee1') ?>

    <?php // echo $form->field($model, 'ceg_ch1fee2') ?>

    <?php // echo $form->field($model, 'ceg_ch2name') ?>

    <?php // echo $form->field($model, 'ceg_ch2birth') ?>

    <?php // echo $form->field($model, 'ceg_ch2dadorder') ?>

    <?php // echo $form->field($model, 'ceg_ch2momorder') ?>

    <?php // echo $form->field($model, 'ceg_ch2reporder') ?>

    <?php // echo $form->field($model, 'ceg_ch2repname') ?>

    <?php // echo $form->field($model, 'ceg_ch2repbirth') ?>

    <?php // echo $form->field($model, 'ceg_ch2repdeath') ?>

    <?php // echo $form->field($model, 'ceg_ch2schl') ?>

    <?php // echo $form->field($model, 'ceg_ch2schlamphur') ?>

    <?php // echo $form->field($model, 'ceg_ch2schlprovince') ?>

    <?php // echo $form->field($model, 'ceg_ch2schlclass') ?>

    <?php // echo $form->field($model, 'ceg_ch2fee1') ?>

    <?php // echo $form->field($model, 'ceg_ch2fee2') ?>

    <?php // echo $form->field($model, 'ceg_ch3name') ?>

    <?php // echo $form->field($model, 'ceg_ch3birth') ?>

    <?php // echo $form->field($model, 'ceg_ch3dadorder') ?>

    <?php // echo $form->field($model, 'ceg_ch3momorder') ?>

    <?php // echo $form->field($model, 'ceg_ch3reporder') ?>

    <?php // echo $form->field($model, 'ceg_ch3repname') ?>

    <?php // echo $form->field($model, 'ceg_ch3repbirth') ?>

    <?php // echo $form->field($model, 'ceg_ch3repdeath') ?>

    <?php // echo $form->field($model, 'ceg_ch3schl') ?>

    <?php // echo $form->field($model, 'ceg_ch3schlamphur') ?>

    <?php // echo $form->field($model, 'ceg_ch3schlprovince') ?>

    <?php // echo $form->field($model, 'ceg_ch3schlclass') ?>

    <?php // echo $form->field($model, 'ceg_ch3fee1') ?>

    <?php // echo $form->field($model, 'ceg_ch3fee2') ?>

    <?php // echo $form->field($model, 'ceg_feeright') ?>

    <?php // echo $form->field($model, 'ceg_money') ?>

    <?php // echo $form->field($model, 'ceg_info') ?>

    <?php // echo $form->field($model, 'ceg_agree') ?>

    <?php // echo $form->field($model, 'ceg_agreemoney') ?>

    <?php // echo $form->field($model, 'ceg_date') ?>

    <?php // echo $form->field($model, 'ceg_stid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
