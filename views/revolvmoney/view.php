<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoBrrvmn */

$this->params['breadcrumbs'][] = ['label' => 'หน้ารายการ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-brrvmn-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.'Delete', ['ลบ', 'id' => $model->id], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.'แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary panbtn']) ?>
		<?= Html::a( Html::icon('open-file').' '.'สร้างใหม่', ['create'], ['class' => 'btn btn-info panbtn']) ?>
	</div>
	<div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 			[
				'label' => $model->attributeLabels()['id'],
				'value' => $model->id,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['user_id'],
				'value' => $model->user_id,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['amount'],
				'value' => $model->amount,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['reason'],
				'value' => $model->reason,			
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>