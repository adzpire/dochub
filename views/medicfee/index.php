<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoMfSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;

$this->registerCss("
.grid-view td {
    white-space: unset;
}
");
?>
<div class="form-auto-mf-index">


<?php Pjax::begin(); ?>
<?= GridView::widget([
    //'id' => 'kv-grid-demo',
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'fid',
            'headerOptions' => [
                'width' => '50px',
            ],
        ],
//        'mf_utelephone',
//        'mf_ucheck',
//        'mf_spname',
//        'mf_dadname',
        // 'mf_momname',
        // 'mf_chname',
        // 'mf_chbirth',
        // 'mf_dadorder',
        // 'mf_momorder',
        // 'mf_chstatus',
        // 'mf_chright',
        // 'mf_repchorder',
        // 'mf_repchname',
        // 'mf_repchbirth',
        // 'mf_repchdeath',
         'mf_ill:ntext',
         'mf_hospital',
        // 'mf_hospitaltype',
        // 'mf_hosbdate',
        // 'mf_hosedate',
        [
            'attribute' => 'mf_feeright',
            'filter' => $searchModel::getItemFeeright(),
            'value' => function($model){
                return $model->getFeeright();
            }
        ],
        // 'mf_lackfor',
        // 'mf_lackright',
        // 'mf_lackamount',
        // 'mf_fiftyfor',
        // 'mf_fiftyamount',
        // 'mf_year',
        // 'mf_usedto',
         'mf_want',
//         'mf_date',
        [
            'attribute' => 'mf_date',
            'format' => ['date','long'],
            'headerOptions' => [
                'width' => '150px',
            ],
        ],
        // 'mf_stid',
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
        ],
    ],
    'pager' => [
        'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
        'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
    ],
    'responsive'=>true,
    'hover'=>true,
    'toolbar'=> [
        ['content'=>
            Html::a(Html::icon('plus').'สร้างแบบฟอร์มใหม่', ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'เพิ่ม')]).' '.
            Html::a(Html::icon('info-sign').'แสดงตัวอย่่าง', ['pdf?id=example'], ['class'=>'btn btn-danger', 'title'=>Yii::t('app', 'แสดงตัวอย่่าง'), 'target'=>'_blank']).' '.
            Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
        ],
        //'{export}',
        '{toggleData}',
    ],
    'panel'=>[
        'type'=>GridView::TYPE_INFO,
        'heading'=> Html::icon($searchModel::fn()['icon']).' '.Html::encode($this->title),
    ],
]); ?>
<?php Pjax::end(); ?></div>
