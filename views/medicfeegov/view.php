<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoMfg */

$this->title = $model->fid;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Mfgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-mfg-view">

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
            'mfg_ucheck',
            'mfg_spname',
            'mfg_spid',
            'mfg_dadname',
            'mfg_dadid',
            'mfg_momname',
            'mfg_momid',
            'mfg_chname',
            'mfg_chid',
            'mfg_chbirth',
            'mfg_chorder',
            'mfg_chstatus',
            'mfg_ill:ntext',
            'mfg_hospital',
            'mfg_hospitaltype',
            'mfg_hosbdate',
            'mfg_hosedate',
            'mfg_hosfee',
            'mfg_recnum',
            'mfg_feeright',
            'mfg_amount',
            'mfg_info:ntext',
            'mfg_uright',
            'mfg_relright',
            'mfg_date',
            'mfg_stid',
        ],
    ]) ?>

</div>
