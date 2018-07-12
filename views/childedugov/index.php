<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\dynagrid\DynaGrid;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoCegSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-ceg-index">

<?= DynaGrid::widget([
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'fid',
            'headerOptions' => [
                'width' => '50px',
            ],
        ],
        'ceg_spname',
//            'ceg_spjobtype',
//            'ceg_spposition',
//            'ceg_spbelong',
        // 'ceg_right',
//             'ceg_feetype',
        [
            'attribute' => 'ceg_feetype',
            'filter' => $searchModel::getItemChfee(),
            'value' => function($model){
                return $model->getChfee();
            }
        ],
         'ceg_ch1name',
        // 'ceg_ch1birth',
        // 'ceg_ch1dadorder',
        // 'ceg_ch1momorder',
        // 'ceg_ch1reporder',
        // 'ceg_ch1repname',
        // 'ceg_ch1repbirth',
        // 'ceg_ch1repdeath',
        // 'ceg_ch1schl',
        // 'ceg_ch1schlamphur',
        // 'ceg_ch1schlprovince',
        // 'ceg_ch1schlclass',
        // 'ceg_ch1fee1',
        // 'ceg_ch1fee2',
        // 'ceg_ch2name',
        // 'ceg_ch2birth',
        // 'ceg_ch2dadorder',
        // 'ceg_ch2momorder',
        // 'ceg_ch2reporder',
        // 'ceg_ch2repname',
        // 'ceg_ch2repbirth',
        // 'ceg_ch2repdeath',
        // 'ceg_ch2schl',
        // 'ceg_ch2schlamphur',
        // 'ceg_ch2schlprovince',
        // 'ceg_ch2schlclass',
        // 'ceg_ch2fee1',
        // 'ceg_ch2fee2',
        // 'ceg_ch3name',
        // 'ceg_ch3birth',
        // 'ceg_ch3dadorder',
        // 'ceg_ch3momorder',
        // 'ceg_ch3reporder',
        // 'ceg_ch3repname',
        // 'ceg_ch3repbirth',
        // 'ceg_ch3repdeath',
        // 'ceg_ch3schl',
        // 'ceg_ch3schlamphur',
        // 'ceg_ch3schlprovince',
        // 'ceg_ch3schlclass',
        // 'ceg_ch3fee1',
        // 'ceg_ch3fee2',
        // 'ceg_feeright',
//            'ceg_money',
        [
            'attribute' => 'ceg_money',
            'headerOptions' => [
                'width' => '100px',
            ],
        ],
        [
            'attribute'=>'ceg_info',
            'visible'=>false,
            'format' => 'ntext',
        ],
        
        // 'ceg_agree',
        // 'ceg_agreemoney',
        [
            'attribute' => 'ceg_date',
            'format' => ['date','long'],
            'headerOptions' => [
                'width' => '130px',
            ],
        ],
        // 'ceg_stid',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}  {pdf}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a(' '.Html::icon('pencil').' ', $url, ['data-toggle'=>'tooltip', 'title'=>'แก้ไข']);
                },
                'pdf' => function ($url, $model, $key) {
                    return Html::a(' '.Html::icon('print').' ', $url, ['data-toggle'=>'tooltip', 'data-pjax'=>0, 'title'=>'พิมพ์', 'target'=>'_blank']);
                },
            ],
            'headerOptions' => [
                'width' => '70px',
            ],
            'contentOptions' => [
                'class'=>'text-center',
            ],
            'header' => 'จัดการ',
            'order'=>DynaGrid::ORDER_FIX_RIGHT,
        ],
    ],	
    'theme'=>'panel-info',
    'showPersonalize'=>true,
	'storage' => 'session',
	'toggleButtonGrid' => [
		'label' => '<span class="glyphicon glyphicon-wrench">ปรับแต่งตาราง</span>'
	],
    'gridOptions'=>[
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        // 'showPageSummary'=>true,
        // 'floatHeader'=>true,
		'pjax'=>true,
		'hover'=>true,
		'pager' => [
			'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
			'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
		],
		'resizableColumns'=>true,
        'responsiveWrap'=>false,
        'panel'=>[
            'heading'=>'<h3 class="panel-title">'.Html::icon($searchModel::fn()['icon']).' '.Html::encode($this->title).'</h3>',
            // 'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
            'after' => false
        ],
        'toolbar' =>  [
            ['content'=>
				Html::a(Html::icon('plus').'สร้างแบบฟอร์มใหม่', ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'เพิ่ม')]).' '.
				Html::a(Html::icon('info-sign').'แสดงตัวอย่่าง', ['pdf?id=example'], ['data-pjax'=>0, 'class'=>'btn btn-danger', 'title'=>Yii::t('app', 'แสดงตัวอย่่าง'), 'target'=>'_blank']).' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['dynagrid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
            ],
            ['content'=>'{dynagrid}'],
            '{toggleData}',
		],
		
    ],
    'options'=>['id'=>'dynagrid-childedugov'] // a unique identifier is important
]); ?>
</div>
