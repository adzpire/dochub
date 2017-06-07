<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoExmDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Form Auto Exm Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-exm-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Form Auto Exm Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'exminfo_id',
            'exminfo_exmid',
            'exminfo_course',
            'exminfo_type',
            'exminfo_degree',
            // 'exminfo_hour',
            // 'exminfo_stdamount',
            // 'exminfo_fee',
            // 'exminfo_note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
