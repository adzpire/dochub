<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
/*
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
*/
/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoBrmn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-brmn-form">

    <?php $form = ActiveForm::begin([
			'layout' => 'horizontal', 
			'id' => 'form-auto-brmn-form',
			'fieldConfig' => [
				  'horizontalCssClasses' => [
						'label' => 'col-md-4',
						'wrapper' => 'col-sm-8',
				  ],
			 ],
			//'validateOnChange' => true,
            //'enableAjaxValidation' => true,
			//	'enctype' => 'multipart/form-data'
			]); ?>

    <?= $form->field($model, 'brmn_stid')->textInput() ?>

    <?= $form->field($model, 'brmn_salary')->textInput() ?>

    <?= $form->field($model, 'brmn_borrow')->textInput() ?>

    <?= $form->field($model, 'brmn_choice')->textInput() ?>

    <?= $form->field($model, 'brmn_other')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'brmn_title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'brmn_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brmn_bdate')->widget(DatePicker::classname(), [
					'language' => 'th',
					'options' => ['placeholder' => 'enterdate'],
					'type' => DatePicker::TYPE_COMPONENT_APPEND,
					'pluginOptions' => [
						'autoclose'=>true,
						'format' => 'yyyy-mm-dd'
					]]) ?>

    <?= $form->field($model, 'brmn_edate')->widget(DatePicker::classname(), [
					'language' => 'th',
					'options' => ['placeholder' => 'enterdate'],
					'type' => DatePicker::TYPE_COMPONENT_APPEND,
					'pluginOptions' => [
						'autoclose'=>true,
						'format' => 'yyyy-mm-dd'
					]]) ?>

<?php 		/* adzpire form tips
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
 ?>     <div class="form-group text-center">
        <?= Html::submitButton( Html::icon('floppy-disk').' '.Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?php /*if(!$model->isNewRecord){ echo Html::resetButton( Html::icon('refresh').' '.Yii::t('app', 'Reset') , ['class' => 'btn btn-warning']);} */
		  echo Html::a( Html::icon('ban-circle').' '.Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
		  ?>
		 
	</div>

    <?php ActiveForm::end(); ?>

</div>
