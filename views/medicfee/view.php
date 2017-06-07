<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoMf */

$this->title = $model->fid;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Mfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-mf-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fid',
            'mf_utelephone',
            'mf_ucheck',
            'mf_spname',
            'mf_dadname',
            'mf_momname',
            'mf_chname',
            'mf_chbirth',
            'mf_dadorder',
            'mf_momorder',
            'mf_chstatus',
            'mf_chright',
            'mf_repchorder',
            'mf_repchname',
            'mf_repchbirth',
            'mf_repchdeath',
            'mf_ill:ntext',
            'mf_hospital',
            'mf_hospitaltype',
            'mf_hosbdate',
            'mf_hosedate',
            'mf_feeright',
            'mf_lackfor',
            'mf_lackright',
            'mf_lackamount',
            'mf_fiftyfor',
            'mf_fiftyamount',
            'mf_year',
            'mf_usedto',
            'mf_want',
            'mf_date',
            'mf_stid',
        ],
    ]) ?>

</div>
