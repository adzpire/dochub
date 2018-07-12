<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Html;
use yii\helpers\Url;
//use yii\bootstrap\Nav;
use backend\components\Monav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\ArrayHelper;
use kartik\widgets\Growl;
use kartik\widgets\SideNav;

AppAsset::register($this);

$js = <<< 'SCRIPT'
/* To initialize BS3 tooltips set this below */
$(function () {
    $("[data-toggle='tooltip']").tooltip();
});
/* To initialize BS3 popovers set this below */
$(function () {
    $("[data-toggle='popover']").popover();
});
SCRIPT;
// Register tooltip/popover initialization javascript
$this->registerJs($js);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php
    $this->registerCssFile("/uploads/adzpireImages/AdzpireCSS.css", [
        'depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
    ?>
</head>
<body style="margin-top: 0px;">
<?php $this->beginBody() ?>
<?php $modul = \Yii::$app->controller->module;
?>
<?php
$this->registerLinkTag([
    //'title' => 'Live News for Yii',
    'rel' => 'shortcut icon',
    'type' => 'image/x-icon',
    'href' => '/media/commsci.ico',
]);
?>
<div class="wrap mywrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img class="cmmslogo" alt="Brand" src="/media/parallax/img/commsci_logo_black.png">'.'<table class="navtablelogo"><tbody>
		  <tr><td>'.Yii::t( 'app', 'ระบบสร้างแบบฟอร์มออนไลน์').'</td></tr>
		  <tr style="font-size: small;"><td>'.Yii::t( 'app', 'ฐานข้อมูลเอกสารและแบบฟอร์มออนไลน์ คณะวิทยาการสื่อสาร').'</td></tr>
		  </tbody></table>',
        'brandUrl' => Url::toRoute('/'.$modul->id),
        'innerContainerOptions' => ['class'=>'container-fluid'],
        'options' => [
            'class' => 'navbar-default',
        ],
    ]);
    $menuItems = [
        /*['label' => Html::Icon('star').' '.Yii::t( 'app', 'ข้อมูลทั้งหมด'), 'url' => ['default/all']],
        [
            'label' => Html::Icon('transfer').' '.Yii::t( 'app', 'tranfer/change'),
            'url' => ['#'],
            'items' => [
                ['label' => Html::Icon('home').' '.Yii::t( 'app', 'tranferloc'), 'url' => ['/inventory/invtlochis/create']],
                ['label' => Html::Icon('stats').' '.Yii::t( 'app', 'changestat'), 'url' => ['/inventory/invtstathis/create']],
                ['label' => Html::Icon('resize-horizontal').' '.Yii::t( 'app', 'Invt Lochistories'), 'url' => ['/inventory/invtlochis']],
                ['label' => Html::Icon('resize-horizontal').' '.Yii::t( 'app', 'Invt Stathistories'), 'url' => ['/inventory/invtstathis']],
            ]
        ],*/
        //['label' => Yii::t( 'app', 'lochistory'), 'url' => ['wru/create'], 'options' => ['class' => 'disabled']],
        ['label' => Html::Icon('folder-open').' '.Yii::t( 'app', 'report'), 'url' => Url::current(), 'options' => ['class' => 'disabled']],
        [
            'label' => Html::Icon('fullscreen') . ' ' . Yii::t('app', 'ระบบที่เกี่ยวข้อง'),
            'url' => ['#'],
            'items' => require(Url::to('@backend/components/relatedlink.php')),
        ],
        ['label' => Html::Icon('info-sign').' '.Yii::t( 'app', 'คำแนะนำการใช้งาน'), 'url' => ['default/readme']],
    ];
    if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => Yii::t( 'app', 'Signup'), 'url' => ['/site/signup']];
        $menuItems1[] = ['label' => Html::Icon('log-in').' '.Yii::t( 'app', 'เข้าสู่ระบบ'), 'url' => Yii::$app->user->loginUrl];
    } else {
        $menuItems1[] = ['label' => Html::Icon('dashboard').' '.Yii::t( 'app', 'office'), 'url' => ['/']];
        $menuItems1[] = ['label' => Html::Icon('globe').' '.Yii::t( 'app', 'หน้าเว็บไซต์หลัก'), 'url' => '/'];
        $menuItems1[] = '<li>'
            . Html::beginForm(['/site/logout', 'url' => Url::current()], 'post')
            . Html::submitButton(
                Html::Icon('log-out') . ' ' . Yii::t('app', 'ออกจากระบบ') . ' (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Monav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    echo Monav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItems1,
    ]);
    NavBar::end();
    ?>
    <div class="container-fluid">
        <?php
        $cookies = Yii::$app->request->cookies;

        if (($cookie = $cookies->get($modul->params['modulecookies'])) !== null) {
            if($cookie->value != $modul->params['ModuleVers']){
                $delcookies = Yii::$app->response->cookies;
                $delcookies->remove($modul->params['modulecookies']);
            }
        }else{
            echo $this->render('/_version');
        }
        ?>
        <?= Breadcrumbs::widget([
            'encodeLabels' => false,
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [
                'label' => Html::Icon('home'),
                'url' => Url::toRoute('/'.$modul->id),
            ],
        ]) ?>
        <?= Alert::widget() ?>
        <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
            <?php
            echo Growl::widget([
                'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                //'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
                'showSeparator' => true,
                'delay' => 1, //This delay is how long before the message shows
                'pluginOptions' => [
                    'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                    'placement' => [
                        'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                        'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'center',
                    ]
                ]
            ]);
            ?>
        <?php endforeach; ?>
        <?php
        //check action for extend col
        $checkaction = Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
        //echo $checkaction;echo Url::to();
        //$extendedpage = ['checking', 'unchange', 'change'];
        ?>
        <div class="col-md-12'<?php //echo ($checkaction != 'default/index') ? 'col-md-9' : 'col-md-6'; ?>">
            <?= $content ?>
        </div>

        <?php /*if(isset($this->blocks['block1'])){
			$this->blocks['block1'];
		 }else{
			echo 'no block';
		 }*/ ?>
    </div>
</div>

<footer class="footer">
    <div class="container-fluid">
         <p>© 2016 - <?php echo date('Y'); ?> PSU YII DEV <span class="label label-danger"><?php echo $modul->params['ModuleVers']; ?></span>
            <?php echo '  '.Yii::t( 'app', 'พบปัญหาในการใช้งาน ติดต่อ - ').Html::icon('envelope'); ?> :  <?php echo Html::mailto('อับดุลอาซิส ดือราแม', 'abdul-aziz.d@psu.ac.th'); ?><?php echo ' '.Html::icon('earphone').' : '.Yii::t( 'app', 'โทรศัพท์ภายใน : 2618'); ?>
            <a href="#" data-toggle="tooltip" title="<?php echo Yii::t( 'app', 'responsive_web'); ?>"><img src="<?php echo '/uploads/adzpireImages/responsive-icon.png'; ?>" width="30" height="30" /></a>
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
