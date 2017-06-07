<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUsebdgtdetail */

$this->title = 'Create Form Auto Usebdgtdetail';
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Usebdgtdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-usebdgtdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
