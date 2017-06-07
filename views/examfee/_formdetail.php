<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use yii\web\View;

use kartik\widgets\Select2;
/*
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;
*/
/* @var $this yii\web\View */
/* @var $model backend\modules\inventory\models\InvtType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-exm-detail-form">

    <?php $form = ActiveForm::begin([
			'layout' => 'horizontal',
			'id' => 'qadddetail',
			'fieldConfig' => [
				  'horizontalCssClasses' => [
						'label' => 'col-md-4',
						'wrapper' => 'col-sm-8',
				  ],
			 ],
			]); ?>

    <?= $form->field($model, 'exminfo_course')->widget(Select2::classname(), [
        'data' => $courses,
        'options' => ['placeholder' => Yii::t('app', 'ค้นหา/เลือก')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'exminfo_type')->dropDownList(
        $examtype
    ) ?>

    <?= $form->field($model, 'exminfo_degree')->dropDownList(
        $degree
    )->label('ระดับปริญญา') ?>

    <?= $form->field($model, 'exminfo_hour')->textInput() ?>

    <?= $form->field($model, 'exminfo_stdamount')->textInput() ?>

    <?= $form->field($model, 'exminfo_note')->textarea(['rows' => 2]) ?>

    <div class="form-group text-center">
        <?= Html::submitButton(Html::icon('floppy-disk').' '.Yii::t('app', 'บันทึก'), ['class' => 'btn btn-success']) ?>

	</div>

    <?php ActiveForm::end(); ?>

    <?php
    $this->registerJs("
$('form#qadddetail').on('beforeSubmit', function(event){

	var form = $(this);
	$.post(
		form.attr('action'),
		form.serialize()
	).done(function(result){
		if(result == 1){
			form.trigger('reset');
			$.pjax.reload({container:'#detailpjax'});
			//alert('".Yii::t('app', 'เพิ่มข้อมูลเรียบร้อย')."');
			$('#modal').modal('hide');
		}else{
			alert(result);
		}
	}).fail(function(result){
		alert('server error');
	});
	return false;
});
", View::POS_END);
    ?>
</div>
