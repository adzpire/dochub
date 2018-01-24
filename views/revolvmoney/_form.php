<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

use yii\helpers\Url;
use kartik\widgets\Select2;
/*
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
*/
/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoBrrvmn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-brrvmn-form">

    <?php $form = ActiveForm::begin([
			'layout' => 'horizontal', 
			'id' => 'form-auto-brrvmn-form',
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
            <strong>โทร.</strong><mark class="_telinfo"> <?php echo $model->isNewRecord ? '-' : $intmdl->number; ?> </mark>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1"><strong>ที่</strong></div>
        <div class="col-md-1">861/ -</div>
        <div class="col-md-3 col-md-offset-3">
            <strong>วันที่</strong>
            <?php echo Yii::$app->formatter->asDate($model->isNewRecord ? date('Y-m-d') : $model->ss->updated_at); ?>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1">
            <strong>เรื่อง</strong>
        </div>
        <div class="col-md-7">ขออนุมัติยืมเงินหมุนเวียนคณะวิทยาการสื่อสาร</div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1">
            <strong>เรียน</strong>
        </div>
        <div class="col-md-7">คณบดี</div>
    </div>
    <div class="col-md-6 col-md-offset-1">
            <?php
            echo $form->field($model, 'user_id', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-4',
                    'wrapper' => 'col-md-8',
                ],
            ])->label('ข้าพเจ้า')->widget(Select2::classname(), [
                'data' => $staff,
                'options' => ['placeholder' => Yii::t('app', 'ค้นหา/เลือก')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    "change" => '
                    function() {
                        var str = $(this).val();
                        console.log(str);
                        $.ajax({
                            url: "'.Url::to(['/dochub/default/posinfo']).'?id="+str,
                            success: function(data){
                                var json = $.parseJSON(data);
                                //$("#content1").html(tmp[0]);
                                //alert(json);
                                $("._posinfo").html(json[0]);
                                $("._telinfo").html(json[1]);
                            }
                        });
                    }',
                ]
            ]);
            ?>

    </div>
    <div class="col-md-5">
        ตำแหน่ง <mark class="_posinfo"> <?php echo $model->isNewRecord ? '-' : $model->user->position->name_th; ?> </mark>
    </div>
    <div class="col-md-11 col-md-offset-1">
        <div class="col-md-3">
            มีความประสงค์ขอยืมเงินหมุนเวียน
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'amount', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" >บาท</span></div>',
            ])->textInput()->label('จำนวน') ?>
        </div>
    </div>
    <div class="col-md-11 col-md-offset-1">
        <div class="col-md-2">
            เพื่อสำรองค่าใช้จ่าย
        </div>
        <div class="col-md-10">
            <?= $form->field($model, 'reason', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-10',
                ]
            ])->textInput() ?>
        </div>
    </div>

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
 ?>     <div class="col-md-12 form-group text-center">
        <?= Html::submitButton(Html::icon('floppy-disk').' '.'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?php
        if(!$model->isNewRecord){
            echo ' ' . Html::a(Html::icon('print') . ' ' . Yii::t('app', 'พิมพ์'), ['pdf', 'id' => $model->id], ['class' => 'btn btn-danger', 'data-pjax' => 0]);
            echo ' ' . Html::resetButton( Html::icon('refresh').' '.'เริ่มใหม่' , ['class' => 'btn btn-warning']);
		 } ?>
		 
	</div>

    <?php ActiveForm::end(); ?>

</div>
