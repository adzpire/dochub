<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoCeg */

$this->title = $model->fid;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Cegs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-ceg-view">

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
            'ceg_spname',
            'ceg_spjobtype',
            'ceg_spposition',
            'ceg_spbelong',
            'ceg_right',
            'ceg_feetype',
            'ceg_ch1name',
            'ceg_ch1birth',
            'ceg_ch1dadorder',
            'ceg_ch1momorder',
            'ceg_ch1reporder',
            'ceg_ch1repname',
            'ceg_ch1repbirth',
            'ceg_ch1repdeath',
            'ceg_ch1schl',
            'ceg_ch1schlamphur',
            'ceg_ch1schlprovince',
            'ceg_ch1schlclass',
            'ceg_ch1fee1',
            'ceg_ch1fee2',
            'ceg_ch2name',
            'ceg_ch2birth',
            'ceg_ch2dadorder',
            'ceg_ch2momorder',
            'ceg_ch2reporder',
            'ceg_ch2repname',
            'ceg_ch2repbirth',
            'ceg_ch2repdeath',
            'ceg_ch2schl',
            'ceg_ch2schlamphur',
            'ceg_ch2schlprovince',
            'ceg_ch2schlclass',
            'ceg_ch2fee1',
            'ceg_ch2fee2',
            'ceg_ch3name',
            'ceg_ch3birth',
            'ceg_ch3dadorder',
            'ceg_ch3momorder',
            'ceg_ch3reporder',
            'ceg_ch3repname',
            'ceg_ch3repbirth',
            'ceg_ch3repdeath',
            'ceg_ch3schl',
            'ceg_ch3schlamphur',
            'ceg_ch3schlprovince',
            'ceg_ch3schlclass',
            'ceg_ch3fee1',
            'ceg_ch3fee2',
            'ceg_feeright',
            'ceg_money',
            'ceg_info:ntext',
            'ceg_agree',
            'ceg_agreemoney',
            'ceg_date',
            'ceg_stid',
        ],
    ]) ?>

</div>
