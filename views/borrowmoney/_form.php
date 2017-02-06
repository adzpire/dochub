<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;

use yii\web\View;

use yii\helpers\Url;
/*use kartik\widgets\ActiveForm;
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
        <div class="col-md-7">ขออนุมัติยืมเงินรายได้มหาวิทยาลัย</div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1">
            <strong>เรียน</strong>
        </div>
        <div class="col-md-7">รองอธิการบดี วิทยาเขตปัตตานี</div>
    </div>
    <div class="col-md-11 col-md-offset-1">
        <div class="col-md-5 col-md-offset-1">
            <?php /* $form->field($model, 'brmn_stid', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
            ])->textInput()->label('ข้าพเจ้า')*/ ?>
            <?php
            echo $form->field($model, 'brmn_stid', [
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
                            url: "'.Url::to(['/dochub/borrowmoney/posinfo']).'?id="+str,
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
        <div class="col-md-3">
            ตำแหน่ง <mark class="_posinfo"> <?php echo $model->isNewRecord ? '-' : $model->brmnSt->position->name_th; ?> </mark>
        </div>
        <div class="col-md-3">
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
                    'wrapper' => 'col-md-10',
                ],
            ])->inline()->label('(เหตุผล)')->radioList($choicearr) ?>
        </div>
    </div>
    <div id="c1" <?php echo ($model->isNewRecord OR $model->brmn_choice != 1) ? ' style="display: none;" ' : false ;
    ?> >
        <div class="col-md-11 col-md-offset-1">
            <div class="col-md-5 col-md-offset-1">
                <?= $form->field($model, 'brmn_title', [
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-9',
                    ],
                ])->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'brmn_place', [
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
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
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
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
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
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

    </div>
    <?= $form->field($model, 'brmn_other', [
        'validateOnChange' => true,
        'enableAjaxValidation' => true,
        'options'=>[
            'style'=> ($model->isNewRecord OR $model->brmn_choice != 3 ) ? ' display: none; ' : false ,
        ]
    ])->textarea(['rows' => 3]) ?>

    <div class="col-md-12 form-group text-center">
        <?= Html::submitButton( Html::icon('floppy-disk').' '.Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?php /*if(!$model->isNewRecord){ echo Html::resetButton( Html::icon('refresh').' '.Yii::t('app', 'Reset') , ['class' => 'btn btn-warning']);} */
		  echo Html::a( Html::icon('ban-circle').' '.Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
		  ?>
		 
	</div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs("
	$(\"input[name='FormAutoBrmn[brmn_choice]']:radio\").click(function() {
        if($(this).attr('value')== 1) {
            //alert('1');
			$('#c1').show().find( 'input' ).prop('disabled', false);
			$('.field-formautobrmn-brmn_other').hide().prop('disabled', true);
        }
        if($(this).attr('value')== 3) {
            //alert('2');
			$('#c1').hide().find( 'input' ).prop('disabled', true);
			$('.field-formautobrmn-brmn_other').show().find( 'input' ).prop('disabled', false);
          /* $('.field-borrowreturn-confirm_comment').hide().find( 'input' ).val('').prop('disabled', true); */
        }
        if($(this).attr('value')== 2) {
            $('#c1').hide().find( 'input' ).prop('disabled', true);
			$('.field-formautobrmn-brmn_other').hide().prop('disabled', true);
			/* $('.field-borrowreturn-confirm_comment').hide().find( 'input' ).val('').prop('disabled', true); */
        }
    });
", View::POS_END);
?>