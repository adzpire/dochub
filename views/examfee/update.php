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

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoExm */

$this->params['breadcrumbs'][] = ['label' => $model::fn()['name'], 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->exmmain_id, 'url' => ['view', 'id' => $model->exmmain_id]];
$this->params['breadcrumbs'][] = 'อัพเดต';
?>
<div class="form-auto-exm-update">

    <div class="panel panel-warning">
        <div class="panel-heading">
            <span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
            <?php /*Html::a( Html::icon('fire').' '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->exmmain_id], [
                'class' => 'btn btn-danger panbtn',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])*/ ?>
            <?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'สร้างใหม่'), ['create'], ['class' => 'btn btn-info panbtn']) ?>
        </div>
        <div class="panel-body">
            <div class="form-auto-exm-form">

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
                    <h3>ใบเบิกค่าตรวจสอบข้อสอบ</h3>
                </div>
                <div class="col-md-12 text-center">
                    <h4>คณะวิทยาการสื่อสาร    มหาวิทยาลัยสงขลานครินคร์    วิทยาเขตปัตตานี</h4>
                </div>

                <div class="col-md-12">
                    <div class="col-md-6">
                        <?php
                        echo $form->field($model, 'exmmain_stid', [
                            'horizontalCssClasses' => [
                                'label' => 'col-md-3',
                                'wrapper' => 'col-md-9',
                            ],
                        ])->label('ผู้ตรวจ')->widget(Select2::classname(), [
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
                        <strong>โทร.</strong>
                        <mark class="_telinfo"> <?php echo $model->isNewRecord ? '-' : $intmdl->number; ?> </mark>
                    </div>
                    <div class="col-md-3">
                        ตำแหน่ง
                        <mark class="_posinfo"> <?php echo $model->isNewRecord ? '-' : $model->exmmainSt->position->name_th; ?> </mark>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div class="col-md-5">
                        <?= $form->field($model, 'exmmain_semester', [
                            'horizontalCssClasses' => [
                                'label' => 'col-md-7',
                                'wrapper' => 'col-md-5',
                            ],
                        ])->inline()->radioList([1=>'1',2=>'2',3=>'3'])->label('การสอบประจำภาคเรียนที่') ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'exmmain_year')->widget(DatePicker::classname(), [
                            'language' => 'th',
                            'options' => ['placeholder' => 'enterdate'],
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy',
                                'todayHighlight' => true,
                                'startView' => 'years',  // start year, month, day
                                'minViewMode' => 'years', // minimum view year, month, day
                            ]]) ?>
                    </div>
                </div>

                <div class="col-md-12 form-group text-center">
                    <?= Html::submitButton(Html::icon('floppy-disk') . ' ' . Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?php
                    echo Html::a(Html::icon('list') . ' ' . Yii::t('app', 'เพิ่มรายการ'), ['qadddetail', 'id' => $model->exmmain_id], ['class' => 'btn btn-success _qdetail']);
                    echo ' ' . Html::a(Html::icon('ban-circle') . ' ' . Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
                    ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</div>
<div class="form-auto-exm-detail-index">
    <?php Pjax::begin(['id' => 'detailpjax']); ?>
    <?= GridView::widget([
        //'id' => 'kv-grid-demo',
        'dataProvider' => $dataProvider,
        //'filterModel' => false,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'exminfo_course',
                'value' => 'exminfoCourse.c_nameTh',
            ],
            [
                'attribute' => 'exminfo_type',
                'value'=>function($model){
                    return $model->etype;
                }
            ],
            [
                'attribute' => 'exminfo_degree',
                'value'=>function($model){
                    return $model->degree;
                }
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'exminfo_hour',
                'pageSummary' => true,
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'exminfo_stdamount',
                'pageSummary' => true,
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'exminfo_fee',
                'pageSummary' => true,
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{updatedetail}{deletedetail}',
                'buttons' => [
                    'updatedetail' => function ($url, $model, $key) {
                        return Html::a(Html::icon('pencil'), $url, [
                            'class' => '_qeditdetail',
                            'data-pjax' => 0,
                        ]);
                    },
                    'deletedetail' => function ($url, $model, $key) {
                        return Html::a(Html::icon('trash'), $url, [
                            'class' => '_qdeletedetail',
                            'data-pjax' => 0,
                        ]);
                    },
                ],
                'headerOptions' => [
                    'width' => '50px',
                ],
            ],
        ],
        'pager' => [
            'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
            'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
        ],
        'responsive' => true,
        'hover' => true,
        'toolbar' => false,
        'showPageSummary' => true,
        'panel' => [
            'type' => GridView::TYPE_INFO,
            'heading' => Html::icon('th-list') . ' รายการรายละเอียด ',
            'before' => (($dataProvider->totalCount >0) ? Html::a(Html::icon('print') . ' ' . Yii::t('app', 'พิมพ์'), ['pdf', 'id' => $model->exmmain_id], ['class' => 'btn btn-danger', 'data-pjax' => 0]) : Html::a(Html::icon('print') . ' ' . Yii::t('app', 'ไม่สามารถพิมพ์ได้(ต้องมีอย่างน้อย 1 รายการรายละเอียด)'), '', ['class' => 'btn btn-default disabled', 'data-pjax'=>0])),
            'beforeOptions' => ['class'=>'text-center kv-panel-before'],
            'after' => '<u>หมายเหตุ</u>
                        <ul>
                            <li><u>ระดับปริญญาตรีหรือตํ่ากว่า</u>
                                <ol>
                                <li>คําตอบแบบอัตนัยล้วนชั่วโมงละ 2 บาทไม่เกินวิชาละ 5 บาทต่อผู้เข้าสอบ 1 คน</li>
                                <li>คําตอบแบบปรนัยล้วนชั่วโมงละ0.50บาทไม่เกินวิชาละ 1.25 บาทต่อผู้เข้าสอบ1คน</li>
                                <li>คําตอบแบบอัตนัยและปรนัยชั่วโมงละ1บาทไม่เกินวิชา2.50 บาทต่อผู้เข้าสอบ1คน</li>
                                <li>สัมภาษณ์หรือภาคปฏิบัติ1บาทต่อผู้เข้าสอบ1คน</li>
                                </ol>
                            </li>
                            <li><u>ระดับประกาศนียบัตรชั้นสูงวิชาเฉพาะ(หลังปริญญาตรี)ปริญญาโทปริญญาเอก</u>
                                <ol>
                                <li>คําตอบแบบอัตนัยล้วนชั่วโมงละ 3 บาทต่อผู้เข้าสอบ 1คน</li>
                                <li>คําตอบแบบอัตนัยและปรนัยชั่วโมงละ1.50บาทต่อผู้เข้าสอบ1คน</li>
                                <li>คําตอบแบบปรนัยล้วนชั่วโมงละ0.75 บาทต่อผู้เข้าสอบ 1คน</li>
                                <li>สัมภาษณ์หรือภาคปฏิบัติ1บาทต่อผู้เข้าสอบ1คน</li>
                                </ol>
                            </li>
                            <li><u>ค่าตรวจกระดาษคําตอบให้เบิกจากเงินงบประมาณรายจ่ายหมวดค่าตอบแทนหรือเงินนอกงบปประมาณ</u></li>
                        </ul>
                        '
        ],
    ]); ?>
    <?php Pjax::end(); ?>
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
$(document).on('click', '._qdetail', function(event){
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
//		alert($(this).attr('href'));
        $('.modal-header').text( \"แก้ไขรายการ\" );
		$('#modal').modal('show')
		.find('#modalcontent')
		.load($(this).attr('href'));
			return false;//just to see what data is coming to js
    });

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
        return false;
    });

", View::POS_READY);

?>