<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use kartik\daterange\DateRangePicker;
use yii\helpers\Url;

/*
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;
*/
/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoPp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-pp-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'form-auto-pp-form',
//			'fieldConfig' => [
//				  'horizontalCssClasses' => [
//						'label' => 'col-md-4',
//						'wrapper' => 'col-sm-8',
//				  ],
//			 ],
        //'validateOnChange' => true,
        //'enableAjaxValidation' => true,
        //	'enctype' => 'multipart/form-data'
    ]); ?>
    <div class="col-md-12">
        <div class="col-md-4 col-md-offset-1">
            <?php /* $form->field($model, 'brmn_stid', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
            ])->textInput()->label('ข้าพเจ้า')*/ ?>
            <?php
            echo $form->field($model, 'pp_stid', [
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
                            url: "' . Url::to(['/dochub/borrowmoney/posinfo']) . '?id="+str,
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
        <div class="col-md-7">
            <?= $form->field($model, 'pp_jid', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
            ])->widget(Select2::classname(), [
                'data' => $jobs,
                'options' => ['placeholder' => Yii::t('app', 'ค้นหา/เลือก')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="strike"><span>ขอเปิดการใช้งานบัญชี PSU Passport ชั่วคราว(สำหรับการใช้งาน internet)</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-11 col-md-offset-1">
            <?= $form->field($model, 'pp_actname', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-4',
                    'wrapper' => 'col-md-8',
                ],
            ])->textInput(['maxlength' => true])->label('โดยใช้กับงาน/โครงการ/กิจกรรม'); ?>
        </div>
    </div>
    <div class="col-md-11 col-md-offset-1">
        <div class="col-md-4">
            <?= $form->field($model, 'pp_accountnum', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-6',
                    'wrapper' => 'col-md-6',
                ],
            ])->textInput() ?>
        </div>
        <div class="col-md-8">
            <!--            --><? //= $form->field($model, 'pp_bdate', [
            //                'horizontalCssClasses' => [
            //                    'label' => 'col-md-3',
            //                    'wrapper' => 'col-md-9',
            //                ],
            //            ])->widget(DatePicker::classname(), [
            //                'language' => 'th',
            //                'options' => ['placeholder' => 'enterdate'],
            //                'type' => DatePicker::TYPE_COMPONENT_APPEND,
            //                'pluginOptions' => [
            //                    'autoclose'=>true,
            //                    'format' => 'yyyy-mm-dd'
            //                ]])->label('ตั้งแต่วันที่'); ?>
            <!--        </div>-->
            <!--        <div class="col-md-4">-->
            <!--            --><? //= $form->field($model, 'pp_edate', [
            //                'horizontalCssClasses' => [
            //                    'label' => 'col-md-3',
            //                    'wrapper' => 'col-md-9',
            //                ],
            //            ])->widget(DatePicker::classname(), [
            //                'language' => 'th',
            //                'options' => ['placeholder' => 'enterdate'],
            //                'type' => DatePicker::TYPE_COMPONENT_APPEND,
            //                'pluginOptions' => [
            //                    'autoclose'=>true,
            //                    'format' => 'yyyy-mm-dd'
            //                ]])->label('ถึงวันที่'); ?>
            <!--        </div>-->
            <!--    </div>-->
                <?php
                if ($model->isNewRecord) {
                    $model->pp_bdate = date('Y-m-d');
                    $model->pp_edate = $model->pp_bdate;
                }

                echo $form->field($model, 'rangedatetime', [
                    //'enableAjaxValidation' => true,
                    //'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span></div>',
                    'horizontalCssClasses' => [
                        'label' => 'col-md-4',
                        'wrapper' => 'col-md-8',
                    ]
                ])->widget(DateRangePicker::classname(), [
                    'model' => $model,
                    'attribute' => 'rangedatetime',
                    //'value'=>'2015-10-19 12:00 AM - 2015-11-03 01:00 PM',
                    'convertFormat' => true,
                    'hideInput' => true,
                    'language'=>'th',
                    'startAttribute' => 'pp_bdate',
                    'endAttribute' => 'pp_edate',
                    'pluginOptions' => [
                        'minDate' => date('Y-m-d'),
                        //'timePickerIncrement' => 15,
                        //'timePicker24Hour' => true,
                        'locale' => ['format' => 'Y-m-d'],
                    ],
                ]);
                ?>
        </div>
    </div>

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
            <?php /*if(!$model->isNewRecord){ echo Html::resetButton( Html::icon('refresh').' '.Yii::t('app', 'Reset') , ['class' => 'btn btn-warning']);} */
            if(!$model->isNewRecord) {
                echo ' ' . Html::a(Html::icon('print') . ' ' . Yii::t('app', 'พิมพ์'), ['pdf', 'id' => $model->pp_id], ['class' => 'btn btn-danger', 'data-pjax' => 0]);
            }
                echo ' ' . Html::a(Html::icon('ban-circle') . ' ' . Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
            ?>

        </div>

        <?php ActiveForm::end(); ?>

    </div>
