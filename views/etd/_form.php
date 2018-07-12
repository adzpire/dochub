<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use kartik\widgets\DateTimePicker;
use dosamigos\ckeditor\CKEditor;
use yii\jui\AutoComplete;
/*
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;
*/
/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\EnglishtestData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="englishtest-data-form">

    <?php $form = ActiveForm::begin([
			'layout' => 'horizontal', 
			'id' => 'englishtest-data-form',
			//'fieldConfig' => [
			//'horizontalCssClasses' => [
				//'label' => 'col-md-4',
				//'wrapper' => 'col-sm-8',
				//],
			//],
			//'validateOnChange' => true,
            //'enableAjaxValidation' => true,
			//	'enctype' => 'multipart/form-data'
			]); ?>

    <?php echo $form->field($model, 'ed_title')->textInput(['maxlength' => true])
//    echo $form->field($model, 'ed_title')->widget(AutoComplete::classname(), [
//        'options' => [
//            'class' => 'form-control',
//            'placeholder' => 'ถ้าหัวข้อเหมือนกันถือว่าเป็นรอบเดี่ยวกัน สมัครซ้ำไม่ได้ '
//        ],
//        'clientOptions' => [
//            'source' => $titlearr,
//            //'source' => ['USA':'USA', 'DR':'DR'],
//        ],
//    ]);
    ?>
    <?php //echo $form->field($model, 'ed_round')->dropdownList($round, ['prompt'=>'ไม่มี'])->label('ควบคุมรอบ')->hint('ไม่ต้องกรอกถ้าไม่ต้องการควบคุมรอบการลงทะเบียน')
        echo $form->field($model, 'ed_round')->widget(AutoComplete::classname(), [
            'options' => [
                'class' => 'form-control',
                'placeholder' => 'พิมพ์เพื่อค้นหา เช่น et1/60, et3/61 เป็นต้น ไม่ต้องกรอกถ้าไม่ต้องการควบคุม'
            ],
            'clientOptions' => [
                'source' => $round,
                //'source' => ['USA':'USA', 'DR':'DR'],
            ],
        ])->hint('ถ้าเหมือนกันถือว่าเป็นรอบเดี่ยวกัน สมัครซ้ำไม่ได้');
     ?>
    <?= $form->field($model, 'ed_active_till')->widget(DateTimePicker::classname(), [
        'language' => 'th',
        'options' => ['placeholder' => 'กรอกวันเวลา'],
        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-m-d H:ii:ss',
        ]]) ?>

    <?php echo $form->field($model, 'ed_limitseat')->textInput(['placeholder' => '0 เท่ากับไม่จำกัด']) ?>

    <?= $form->field($model, 'ed_datechoice')->widget(AutoComplete::classname(), [
        'options' => [
            'class' => 'form-control',
            'placeholder' => 'พิมพ์รหัสหรือชื่อสถานที่ เช่น A312, ห้องปฏิบัตการ '
        ],
        'clientOptions' => [
            'source' => $locarr,
            //'source' => ['USA':'USA', 'DR':'DR'],
        ],
    ]) ?>

    <?php /*$form->field($model, 'ed_datechoice')->widget(DatePicker::classname(), [
        'language' => 'th',
        'options' => ['placeholder' => 'enterdate'],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'multidate' => true,
            'multidateSeparator' => ',',
        ]])*/ ?>

    <?php //$form->field($model, 'ed_note')->textarea(['rows' => 6])
    echo $form->field($model, 'ed_note')->widget(CKEditor::className(), [
        'preset' => 'basic'
        //'clientOptions' => KCFinder::registered()
    ]);
    ?>
    <?php
    echo $form->field($model, 'ed_confirm')->widget(CKEditor::className(), [
        'preset' => 'basic'
    ]);
    ?>

    <?php // $form->field($model, 'created_by')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <?php // $form->field($model, 'updated_by')->textInput() ?>

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
        <?= Html::submitButton(Html::icon('floppy-disk').' '.'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?php if(!$model->isNewRecord){
		 echo Html::resetButton( Html::icon('refresh').' '.'เริ่มใหม่' , ['class' => 'btn btn-warning']); 
		 } ?>
		 
	</div>

    <?php ActiveForm::end(); ?>

</div>
