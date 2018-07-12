<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use kartik\widgets\Select2;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
/*

use kartik\widgets\ActiveForm;

*/
/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormMf2016 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-mf2016-form">

    <?php $form = ActiveForm::begin([
			'layout' => 'horizontal', 
			'id' => 'form-mf2016-form',
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
    <div class="col-md-12">
        <h4 class="text-right">แบบ กทพ. 01</h4>
        <h4 class="text-center">ใบเบิกเงินสวัสดิการเกี่ยวกับการรักษาพยาบาลพนักงานมหาวิทยาลัย</h4>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <?php /* $form->field($model, 'brmn_stid', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
            ])->textInput()->label('ข้าพเจ้า')*/ ?>
            <?php
            echo $form->field($model, 'mf_stid', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
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
                                $("._posinfo").html(json[0]);
                                $("._telinfo").html(json[1]);
                            }
                        });
                    }',
                ]
            ]);
            ?>
        </div>
        <div class="col-md-3">
            ตำแหน่ง <mark class="_posinfo"> <?php echo $model->isNewRecord ? '-' : $model->mfSt->position->name_th; ?> </mark>
        </div>
        <div class="col-md-3">
            <strong>โทร.</strong><mark class="_telinfo"> <?php echo $model->isNewRecord ? '-' : $intmdl->number; ?> </mark>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-5">
            <?= $form->field($model, 'mf_ill', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
            ])->textInput()->label('ป่วยเป็นโรค') ?>
        </div>
        <div class="col-md-7">
            <?= $form->field($model, 'mf_hospital', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-4',
                    'wrapper' => 'col-md-8',
                ],
            ])->textInput(['maxlength' => true])->label('สถานพยาบาลที่เข้ารับการรักษา') ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
    <?= $form->field($model, 'mf_want', [
        'horizontalCssClasses' => [
            'label' => 'col-md-4',
            'wrapper' => 'col-md-8',
        ],
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
    ])->textInput()->label('ขอเบิกเงินจำนวน') ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'mf_date')->widget(DatePicker::classname(), [
                'language' => 'th',
                'options' => [
                    'placeholder' => 'enterdate',
                    'value' => $model->isNewRecord ? date('Y-m-d') : $model->mf_date,
                ],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]]) ?>
        </div>
    </div>
    <div class="col-md-11 col-md-offset-1">
        <?= $form->field($model, 'mf_choice',[
            'horizontalCssClasses' => [
                'label' => 'col-md-1',
                'wrapper' => 'col-md-11',
                'hint' => 'col-md-12',
            ],
        ])->label('เพื่อเป็น')->radioList($choice)->hint('<span class="text-danger"><strong>ท่านต้องแนบเอกสารประกอบการขอเบิก คือ ใบเสร็จและใบรับรองแพทย์ ด้วยทุกครั้ง</strong></span>'); ?>
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
 ?>     <div class="form-group text-center">
        <?= Html::submitButton(Html::icon('floppy-disk').' '.'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?php if(!$model->isNewRecord){
            echo ' ' . Html::a(Html::icon('print') . ' ' . Yii::t('app', 'พิมพ์'), ['pdf', 'id' => $model->fid], ['class' => 'btn btn-danger', 'data-pjax' => 0]);
		    echo ' ' . Html::resetButton( Html::icon('refresh').' '.'เริ่มใหม่' , ['class' => 'btn btn-warning']);
		 } ?>
		 
	</div>

    <?php ActiveForm::end(); ?>

</div>
