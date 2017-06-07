<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use yii\web\View;
/*
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
*/
/* @var $this yii\web\View */
/* @var $model backend\modules\thailocale\models\PersonAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-address-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'person-address-form',
        //'validateOnChange' => true,
        //'enableAjaxValidation' => true,
        //	'enctype' => 'multipart/form-data'
    ]); ?>

    <?= $form->field($model, 'pa_houseno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pa_street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pa_district')->widget(DepDrop::classname(), [
        'data' => $model->isNewRecord ? [] : $district,
        'pluginOptions' => [
            'depends' => ['ddl-province', 'ddl-amphur'],
            'placeholder' => 'เลือกตำบล...',
            'url' => Url::to(['/thailocale/default/get-district'])
        ]
    ]); ?>

    <?= $form->field($model, 'pa_amphur')->widget(DepDrop::classname(), [
        'options' => ['id' => 'ddl-amphur'],
        'data' => $model->isNewRecord ? [] : $amphur,
        'pluginOptions' => [
            'depends' => ['ddl-province'],
            'placeholder' => 'เลือกอำเภอ...',
            'url' => Url::to(['/thailocale/default/get-amphur']),
        ]
    ])->label('อำเภอ'); ?>

    <?= $form->field($model, 'pa_province')->dropdownList(
        $province,
        [
            'id' => 'ddl-province',
            'prompt' => 'เลือกจังหวัด'
        ])->label('จังหวัด'); ?>
    <?php /* adzpire form tips
		$form->field($model, 'wu_tel', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]);
		//file field
				echo $form->field($model, 'file',[
		'addon' => [
       
'append' => !empty($model->wt_image) ? [
			'content'=> Html::a( Html::icon('download').' '.Yii::t('app', 'download'), Url::to('@backend/web/'.$model->wt_image), ['class' => 'btn btn-success', 'target' => '_blank']), 'asButton'=>true] : false
    ]])->widget(FileInput::classname(), [
			//'options' => ['accept' => 'image/*'],
			'pluginOptions' => [
				'showPreview' => false,
				'showCaption' => true,
				'showRemove' => true,
				'initialCaption'=> $model->isNewRecord ? '' : $model->wt_image,
				'showUpload' => false
			]
]);
		*/
    ?>
    <div class="form-group text-center">
        <?= Html::submitButton(Html::icon('floppy-disk') . ' ' . Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>
    <?php
    $this->registerJs("
$('form#person-address-form').on('beforeSubmit', function(event){

	var form = $(this);
	$.post(
		form.attr('action'),
		form.serialize()
	).done(function(result){
		if(result == 1){
			form.trigger('reset');
			$.pjax.reload({container:'#belpjax'});
			alert('" . Yii::t('app', 'เพิ่มข้อมูลเรียบร้อย') . "');
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
