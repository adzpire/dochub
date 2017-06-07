<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUsebdgt */

$this->title = $model->usebdgt_id;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Usebdgts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-usebdgt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->usebdgt_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->usebdgt_id], [
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
            'usebdgt_id',
            'usebdgt_stid',
            'usebdgt_date',
            'usebdgt_year',
            'usebdgt_reason:ntext',
            'usebdgt_bookno',
            'usebdgt_bookdate',
            'usebdgt_headcmitt',
            'usebdgt_frstcmitt',
            'usebdgt_scndcmitt',
        ],
    ]) ?>

</div>
