<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoExmDetail */

$this->title = 'Create Form Auto Exm Detail';
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Exm Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-exm-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
