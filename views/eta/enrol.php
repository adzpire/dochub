<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\EnglishtestAttendee */

?>
<div class="englishtest-attendee-create">

    <div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
			<?= Html::a( Html::icon('list-alt').' กลับหน้ารายการ', ['activelist'], ['class' => 'btn btn-info pull-right']) ?>
		</div>
		<div class="panel-body">
            <table class="table table-striped table-bordered detail-view">
                <tbody>
                <tr>
                    <th>รหัสนักศึกษา</th>
                    <td><?php echo $_SESSION['ldapData']['accountname']; ?></td>
                </tr>
                <?php $thname = explode(" ", $_SESSION['ldapData']['description']); ?>
                <tr>
                    <th>ชื่อไทย</th>
                    <td><?php echo $thname[0]; ?></td>
                </tr>
                <tr>
                    <th>นามสกุลไทย</th>
                    <td><?php echo $thname[1]; ?></td>
                </tr>
                <tr>
                    <th>ชื่ออังกฤษ</th>
                    <td><?php echo $_SESSION['ldapData']['firstname']; ?></td>
                </tr>
                <tr>
                    <th>นามสกุลอังกฤษ</th>
                    <td><p><?php echo $_SESSION['ldapData']['lastname']; ?></p></td>
                </tr>
                </tbody>
            </table>
        <?= DetailView::widget([
            'model' => $datamdl,
            'attributes' => [
                [
                    'label' => $datamdl->attributeLabels()['ed_title'],
                    'value' => $datamdl->ed_title,
                    //'format' => ['date', 'long']
                ],
                [
                    'label' => $datamdl->attributeLabels()['ed_note'],
                    'value' => $datamdl->ed_note,
                    'format' => ['html']
                ],
                [
                    'label' => $datamdl->attributeLabels()['ed_active_till'],
                    'value' => $datamdl->ed_active_till,
                    'format' => ['datetime']
                ],
            ],
        ]) ?>

		 <?= $this->render('_enrolform', [
			  'model' => $model,
			  'datelist' => $datelist,
		 ]) ?>
		</div>
	</div>

</div>
