<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoCeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-ce-index">

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
        'ce_spname',
//        'ce_spjobtype',
//        'ce_spposition',
//        'ce_spbelong',
        // 'ce_hasbright',
        [
            'attribute' => 'ce_feetype',
            'filter' => $searchModel::getItemChfee(),
            'value' => function($model){
                return $model->getChfee();
            }
        ],
         'ce_ch1name',
        // 'ce_ch1birth',
        // 'ce_ch1dadorder',
        // 'ce_ch1momorder',
        // 'ce_ch1reporder',
        // 'ce_ch1repname',
        // 'ce_ch1repbirth',
        // 'ce_ch1repdeath',
        // 'ce_ch1schl',
        // 'ce_ch1schlamphur',
        // 'ce_ch1schlprovince',
        // 'ce_ch1schlclass',
        // 'ce_ch1fee1',
        // 'ce_ch1fee2',
        // 'ce_ch2name',
        // 'ce_ch2birth',
        // 'ce_ch2dadorder',
        // 'ce_ch2momorder',
        // 'ce_ch2reporder',
        // 'ce_ch2repname',
        // 'ce_ch2repbirth',
        // 'ce_ch2repdeath',
        // 'ce_ch2schl',
        // 'ce_ch2schlamphur',
        // 'ce_ch2schlprovince',
        // 'ce_ch2schlclass',
        // 'ce_ch2fee1',
        // 'ce_ch2fee2',
        // 'ce_ch3name',
        // 'ce_ch3birth',
        // 'ce_ch3dadorder',
        // 'ce_ch3momorder',
        // 'ce_ch3reporder',
        // 'ce_ch3repname',
        // 'ce_ch3repbirth',
        // 'ce_ch3repdeath',
        // 'ce_ch3schl',
        // 'ce_ch3schlamphur',
        // 'ce_ch3schlprovince',
        // 'ce_ch3schlclass',
        // 'ce_ch3fee1',
        // 'ce_ch3fee2',
        // 'ce_whole',
        // 'ce_half',
        // 'ce_piece',
        [
            'attribute' => 'ce_sum',
            'headerOptions' => [
                'width' => '100px',
            ],
        ],
        // 'ce_agree',
        // 'ce_agreemoney',
        [
            'attribute' => 'ce_date',
            'format' => ['date','long'],
            'headerOptions' => [
                'width' => '150px',
            ],
        ],
        // 'ce_accname',
        // 'ce_accnum',
        // 'ce_stid',
        // 'unpbdgt_reason:ntext',
        // 'unpbdgt_tax',
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
