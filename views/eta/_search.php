<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\EnglishtestAttendeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="englishtest-attendee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ed_id') ?>

    <?= $form->field($model, 'person_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'firstname_th') ?>

    <?php // echo $form->field($model, 'lastname_th') ?>

    <?php // echo $form->field($model, 'firstname_eng') ?>

    <?php // echo $form->field($model, 'lastname_eng') ?>

    <?php // echo $form->field($model, 'ea_date') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('search').' '.'Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Html::icon('refresh').' '.'Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
