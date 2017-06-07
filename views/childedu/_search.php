<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoCeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-ce-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fid') ?>

    <?= $form->field($model, 'ce_spname') ?>

    <?= $form->field($model, 'ce_spjobtype') ?>

    <?= $form->field($model, 'ce_spposition') ?>

    <?= $form->field($model, 'ce_spbelong') ?>

    <?php // echo $form->field($model, 'ce_hasbright') ?>

    <?php // echo $form->field($model, 'ce_feetype') ?>

    <?php // echo $form->field($model, 'ce_ch1name') ?>

    <?php // echo $form->field($model, 'ce_ch1birth') ?>

    <?php // echo $form->field($model, 'ce_ch1dadorder') ?>

    <?php // echo $form->field($model, 'ce_ch1momorder') ?>

    <?php // echo $form->field($model, 'ce_ch1reporder') ?>

    <?php // echo $form->field($model, 'ce_ch1repname') ?>

    <?php // echo $form->field($model, 'ce_ch1repbirth') ?>

    <?php // echo $form->field($model, 'ce_ch1repdeath') ?>

    <?php // echo $form->field($model, 'ce_ch1schl') ?>

    <?php // echo $form->field($model, 'ce_ch1schlamphur') ?>

    <?php // echo $form->field($model, 'ce_ch1schlprovince') ?>

    <?php // echo $form->field($model, 'ce_ch1schlclass') ?>

    <?php // echo $form->field($model, 'ce_ch1fee1') ?>

    <?php // echo $form->field($model, 'ce_ch1fee2') ?>

    <?php // echo $form->field($model, 'ce_ch2name') ?>

    <?php // echo $form->field($model, 'ce_ch2birth') ?>

    <?php // echo $form->field($model, 'ce_ch2dadorder') ?>

    <?php // echo $form->field($model, 'ce_ch2momorder') ?>

    <?php // echo $form->field($model, 'ce_ch2reporder') ?>

    <?php // echo $form->field($model, 'ce_ch2repname') ?>

    <?php // echo $form->field($model, 'ce_ch2repbirth') ?>

    <?php // echo $form->field($model, 'ce_ch2repdeath') ?>

    <?php // echo $form->field($model, 'ce_ch2schl') ?>

    <?php // echo $form->field($model, 'ce_ch2schlamphur') ?>

    <?php // echo $form->field($model, 'ce_ch2schlprovince') ?>

    <?php // echo $form->field($model, 'ce_ch2schlclass') ?>

    <?php // echo $form->field($model, 'ce_ch2fee1') ?>

    <?php // echo $form->field($model, 'ce_ch2fee2') ?>

    <?php // echo $form->field($model, 'ce_ch3name') ?>

    <?php // echo $form->field($model, 'ce_ch3birth') ?>

    <?php // echo $form->field($model, 'ce_ch3dadorder') ?>

    <?php // echo $form->field($model, 'ce_ch3momorder') ?>

    <?php // echo $form->field($model, 'ce_ch3reporder') ?>

    <?php // echo $form->field($model, 'ce_ch3repname') ?>

    <?php // echo $form->field($model, 'ce_ch3repbirth') ?>

    <?php // echo $form->field($model, 'ce_ch3repdeath') ?>

    <?php // echo $form->field($model, 'ce_ch3schl') ?>

    <?php // echo $form->field($model, 'ce_ch3schlamphur') ?>

    <?php // echo $form->field($model, 'ce_ch3schlprovince') ?>

    <?php // echo $form->field($model, 'ce_ch3schlclass') ?>

    <?php // echo $form->field($model, 'ce_ch3fee1') ?>

    <?php // echo $form->field($model, 'ce_ch3fee2') ?>

    <?php // echo $form->field($model, 'ce_whole') ?>

    <?php // echo $form->field($model, 'ce_half') ?>

    <?php // echo $form->field($model, 'ce_piece') ?>

    <?php // echo $form->field($model, 'ce_sum') ?>

    <?php // echo $form->field($model, 'ce_agree') ?>

    <?php // echo $form->field($model, 'ce_agreemoney') ?>

    <?php // echo $form->field($model, 'ce_date') ?>

    <?php // echo $form->field($model, 'ce_accname') ?>

    <?php // echo $form->field($model, 'ce_accnum') ?>

    <?php // echo $form->field($model, 'ce_stid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
