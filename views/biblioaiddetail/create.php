<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoLibraidetail */

$this->title = 'Create Form Auto Libraidetail';
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Libraidetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-libraidetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
