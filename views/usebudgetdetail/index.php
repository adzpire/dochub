<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoUsebdgtdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Form Auto Usebdgtdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-usebdgtdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Form Auto Usebdgtdetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usebdgtdet_id',
            'usebdgtdet_ubid',
            'usebdgtdet_title',
            'usebdgtdet_amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
