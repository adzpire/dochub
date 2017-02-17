<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoPpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-pp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pp_id') ?>

    <?= $form->field($model, 'pp_actname') ?>

    <?= $form->field($model, 'pp_accountnum') ?>

    <?= $form->field($model, 'pp_bdate') ?>

    <?= $form->field($model, 'pp_edate') ?>

    <?php // echo $form->field($model, 'pp_stid') ?>

    <?php // echo $form->field($model, 'pp_jid') ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('search').' '.Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Html::icon('refresh').' '.Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
