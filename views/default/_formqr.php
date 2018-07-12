<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\Select2;
use kartik\widgets\ColorInput;
/*
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
*/
/* @var $this yii\web\View */
/* @var $model backend\modules\intercom\models\MainIntercom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-intercom-form">

    <?php $form = ActiveForm::begin([
			'layout' => 'horizontal', 
			'id' => 'main-intercom-form',
			'fieldConfig' => [
				  'horizontalCssClasses' => [
						'label' => 'col-md-3',
						'wrapper' => 'col-sm-9',
				  ],
			 ],
			//'validateOnChange' => true,
            //'enableAjaxValidation' => true,
			//	'enctype' => 'multipart/form-data'
			]); ?>
    <?= $form->field($model, 'url')->textInput(['maxlength' => true, 'placeholder'=>'เช่น http://comm-sci.pn.psu.ac.th/office/intercom']) ?>
    <?= $form->field($model, 'label')->textInput(['maxlength' => true, 'placeholder'=>'เช่น โทรศัพท์ภายใน'])->label('ข้อความใต้ภาพ') ?>
    <?= $form->field($model, 'fontsize')->textInput(['maxlength' => true])->label('ขนาดข้อความ') ?>
    <?= $form->field($model, 'size')->textInput(['maxlength' => true])->label('ขนาดภาพ Qrcode(px)') ?>
	<?= $form->field($model, 'fgcolor')->widget(ColorInput::classname(), [
		//'value' => 'rgb(0, 0, 0)',
		'options' => ['readonly' => true],
		'pluginOptions' => [
			//'showInput' => false,
			'preferredFormat' => 'rgb'
		]
	])->label('สี') ?>

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
        <?= Html::submitButton( Html::icon('qrcode').' '.Yii::t('app', 'สร้าง QR code'), ['class' => 'btn btn-primary']) ?>
		<?php /*if(!$model->isNewRecord){ echo Html::resetButton( Html::icon('refresh').' '.Yii::t('app', 'Reset') , ['class' => 'btn btn-warning']); */
		  echo Html::a( Html::icon('ban-circle').' '.Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
		?>
		 
	</div>

    <?php ActiveForm::end(); ?>

</div>
