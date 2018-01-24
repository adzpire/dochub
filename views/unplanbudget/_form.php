<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

use yii\helpers\Url;

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use kartik\grid\GridView;

use yii\widgets\Pjax;

use yii\web\View;

use backend\components\ThaibudgetyearWidget;
/*
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
*/
/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUnplnbdgt */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="form-auto-unplnbdgt-form">

        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'id' => 'form-auto-unplnbdgt-form',
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
                <strong>โทร.</strong>
                <mark class="_telinfo"> <?php echo $model->isNewRecord ? '-' : $intmdl->number; ?> </mark>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-1"><strong>ที่</strong></div>
            <div class="col-md-1">861/ -</div>
            <div class="col-md-4 col-md-offset-3">
                <?= $form->field($model, 'unpbdgt_date', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-9',
                    ],
                ])->widget(DatePicker::classname(), [
                    'language' => 'th',
                    'options' => ['placeholder' => 'enterdate'],
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]]) ?>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-1">
                <strong>เรื่อง</strong>
            </div>
            <div class="col-md-7">ขออนุมัติจัดซื้อครุภัณฑ์นอกแผนการจัดซื้อประจําปี <?= ThaibudgetyearWidget::widget([
                    'date' => date('Y-m-d'),
                ]) ?>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-1">
                <strong>เรียน</strong>
            </div>
            <div class="col-md-7">คณบดี</div>
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
                echo $form->field($model, 'unpbdgt_stid', [
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
            <div class="col-md-3">
                ตำแหน่ง
                <mark class="_posinfo"> <?php echo $model->isNewRecord ? '-' : $model->unpbdgtSt->position->name_th; ?> </mark>
            </div>

        </div>
        <div class="col-md-11 col-md-offset-1">
            <div class="col-md-4">
                <?= $form->field($model, 'unpbdgt_job', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-9',
                    ],
                ])->textInput()->label('ด้วยงาน') ?>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'unpbdgt_year', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-5',
                        'wrapper' => 'col-md-4',
                    ],
                ])->label('มีความประสงค์ขออนุมัติจัดซื้อ ครุภัณฑ์นอกแผนการจัดซื้อประจําปี')->widget(DatePicker::classname(), [
                    'language' => 'th',
                    'options' => ['placeholder' => 'enterdate'],
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy',
                        'startView' => 'years',  // start year, month, day
                        'minViewMode' => 'years', // minimum view year, month, day
                    ]])->hint('<code>ถ้าจัดซื้อเกินเดือนตุลาคมให้กรอกเป็นปีงบประมาณถัดไป</code>') ?>
            </div>
        </div>
        <div class="col-md-11 col-md-offset-1">
            <?= $form->field($model, 'unpbdgt_reason', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-9',
                ],
            ])->textarea(['rows' => 4]) ?>
        </div>

        <?php if (!$model->isNewRecord) {
                    echo $form->field($model, 'unpbdgt_tax', [
                        'horizontalCssClasses' => [
                            'label' => 'col-md-1',
                            'wrapper' => 'col-md-2',
                            'hint' => 'col-md-2',
                        ],
                    ])->checkBox(['label' => 'คำนวณภาษี 7% '])->hint('<code>ผลการคำนวณจะปรากฏในการพิมพ์</code>');
                }
        ?>
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
        <div class="col-md-12 form-group text-center">
            <?= Html::submitButton(Html::icon('play') . ' ' . Yii::t('app', 'ต่อไป'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
            <?php
            echo ' ' . Html::a(Html::icon('ban-circle') . ' ' . Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
            ?>

        </div>

        <?php ActiveForm::end(); ?>

    </div>

<?php
Modal::begin([
    'id' => 'modal',
    'header' => 'เพิ่มรายการ',
]);
echo '<div id ="modalcontent"></div>';
Modal::end();
?>
<?php

$this->registerJs("
$('._qdetail').on('click', function(event){
		event.preventDefault();
		//alert($(this).attr('href'));
		$('.modal-header').text( \"เพิ่มรายการ\" );
		$('#modal').modal('show')
		.find('#modalcontent')
		.load($(this).attr('href'));
			return false;//just to see what data is coming to js
    });

$(document).on('click', '._qeditdetail', function(event){
		event.preventDefault();
        $('.modal-header').text( \"แก้ไขรายการ\" );
		$('#modal').modal('show')
		.find('#modalcontent')
		.load($(this).attr('href'));
			return false;//just to see what data is coming to js
    });

//$('._qdeletedetail').on('click', function(event){
$(document).on('click', '._qdeletedetail', function(event){
		event.preventDefault();
		if(confirm('sure?')){
            $.get(
                $(this).attr('href')
            ).done(function(result){
                if(result == 1){
                    alert('deleted');
                    $.pjax.reload({container:'#detailpjax'});
                }else{
                    alert(result);
                }
            }).fail(function(result){
                alert('server error');
            });
		}		
    });
    
", View::POS_READY);

?>