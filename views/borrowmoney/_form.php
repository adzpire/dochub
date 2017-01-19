<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
/*
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;
*/

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoBrmn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-brmn-form">

    <?php $form = ActiveForm::begin([
			'layout' => 'horizontal', 
			'id' => 'form-auto-brmn-form',
			/*'fieldConfig' => [
				  'horizontalCssClasses' => [
						'label' => 'col-md-4',
						'wrapper' => 'col-sm-8',
				  ],
			 ],*/
			//'validateOnChange' => true,
            //'enableAjaxValidation' => true,
			//	'enctype' => 'multipart/form-data'
			]); ?>
    <div class="col-md-12 text-center">
        <div class="col-md-1 col-md-offset-1">
            <?php
            echo Html::img('/old/images/PSU.png', ['width' => '75px']);
            ?>
        </div>
        <div class="col-md-8 text-center">
            <h3>บันทึกข้อความ</h3>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1">
            ส่วนงาน
        </div>
        <div class="col-md-2">
            คณะวิทยาการสื่อสาร
        </div>
        <div class="col-md-2 col-md-offset-1">
            <strong>โทร.</strong> 2663
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1"><strong>ที่</strong></div>
        <div class="col-md-1">861/ -</div>
        <div class="col-md-3 col-md-offset-3">
            <strong>วันที่</strong>   19 มกราคม 2560
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1">
            <strong>เรื่อง</strong>
        </div>
        <div class="col-md-7">ขออนุมัติยืมเงินรายได้มหาวิทยาลัย</div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1">
            <strong>เรียน</strong>
        </div>
        <div class="col-md-7">รองอธิการบดี วิทยาเขตปัตตานี</div>
    </div>
    <div class="col-md-11 col-md-offset-1">
        <div class="col-md-4 col-md-offset-1">
            <?= $form->field($model, 'brmn_stid', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
            ])->textInput()->label('ข้าพเจ้า') ?>
        </div>
        <div class="col-md-3">
            ตำแหน่ง นักวิชาการคอมพิวเตอร์
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'brmn_salary', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-6',
                    'wrapper' => 'col-md-6',
                ],
            ])->textInput()->label('อัตราเงินเดือน') ?>
        </div>
    </div>
    <div class="col-md-11 col-md-offset-1">
        <div class="col-md-4">
            มีความประสงค์ขอยืมเงินรายได้มหาวิทยาลัย
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'brmn_borrow', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-6',
                ],
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" >บาท</span></div>',
            ])->textInput()->label('จำนวน') ?>
        </div>
    </div>
    <div class="col-md-11 col-md-offset-1">
        <div class="col-md-2 col-md-offset-1">
            เพื่อสำรองค่าใช้จ่าย
        </div>
        <div class="col-md-9">
            <?= $form->field($model, 'brmn_choice',[
                'validateOnChange' => true,
                'enableAjaxValidation' => true,
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-6',
                ],
            ])->inline()->label('(เหตุผล)')->radioList($choicearr, ['id'=>'ptype']) ?>
        </div>
    </div>
    <div class="col-md-11 col-md-offset-1">
        <div class="col-md-5 col-md-offset-1">
            <?= $form->field($model, 'brmn_title', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
            ])->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'brmn_place', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
            ])->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-md-11 col-md-offset-1">
        <div class="col-md-5 col-md-offset-1">
            <?= $form->field($model, 'brmn_bdate', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-4',
                    'wrapper' => 'col-md-8',
                ],
            ])->widget(DatePicker::classname(), [
                'language' => 'th',
                'options' => ['placeholder' => 'enterdate'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'brmn_edate', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-4',
                    'wrapper' => 'col-md-8',
                ],
            ])->widget(DatePicker::classname(), [
                'language' => 'th',
                'options' => ['placeholder' => 'enterdate'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]]) ?>
        </div>
    </div>
    <?= $form->field($model, 'brmn_other')->textarea(['rows' => 6]) ?>

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
