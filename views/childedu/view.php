<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoCe */

$this->title = $model->fid;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Ces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-ce-view">

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
            'ce_spname',
            'ce_spjobtype',
            'ce_spposition',
            'ce_spbelong',
            'ce_hasbright',
            'ce_feetype',
            'ce_ch1name',
            'ce_ch1birth',
            'ce_ch1dadorder',
            'ce_ch1momorder',
            'ce_ch1reporder',
            'ce_ch1repname',
            'ce_ch1repbirth',
            'ce_ch1repdeath',
            'ce_ch1schl',
            'ce_ch1schlamphur',
            'ce_ch1schlprovince',
            'ce_ch1schlclass',
            'ce_ch1fee1',
            'ce_ch1fee2',
            'ce_ch2name',
            'ce_ch2birth',
            'ce_ch2dadorder',
            'ce_ch2momorder',
            'ce_ch2reporder',
            'ce_ch2repname',
            'ce_ch2repbirth',
            'ce_ch2repdeath',
            'ce_ch2schl',
            'ce_ch2schlamphur',
            'ce_ch2schlprovince',
            'ce_ch2schlclass',
            'ce_ch2fee1',
            'ce_ch2fee2',
            'ce_ch3name',
            'ce_ch3birth',
            'ce_ch3dadorder',
            'ce_ch3momorder',
            'ce_ch3reporder',
            'ce_ch3repname',
            'ce_ch3repbirth',
            'ce_ch3repdeath',
            'ce_ch3schl',
            'ce_ch3schlamphur',
            'ce_ch3schlprovince',
            'ce_ch3schlclass',
            'ce_ch3fee1',
            'ce_ch3fee2',
            'ce_whole',
            'ce_half',
            'ce_piece',
            'ce_sum',
            'ce_agree',
            'ce_agreemoney',
            'ce_date',
            'ce_accname',
            'ce_accnum',
            'ce_stid',
        ],
    ]) ?>

</div>
