<?php
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
    
<link rel="apple-touch-icon" sizes="57x57" href="/vendors/images/logo/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/vendors/images/logo/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/vendors/images/logo/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/vendors/images/logo/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/vendors/images/logo/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/vendors/images/logo/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/vendors/images/logo/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/vendors/images/logo/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/vendors/images/logo/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/vendors/images/logo/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/vendors/images/logo/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/vendors/images/logo/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/vendors/images/logo/favicon-16x16.png">
<link rel="manifest" href="/vendors/images/logo/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/vendors/images/logo/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
$user_group = 0;
if(!Yii::$app->user->isGuest) {
$user_group = Yii::$app->user->identity->user_group;
}
    NavBar::begin([
        'brandLabel' =>' <img src="/vendors/images/img/WS-CMYKLogo-WHT.png" alt="'.Yii::$app->name.'"  height="25"> ' ,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
        
    ];
    
    if($user_group==1){
    $menuItems[] = ['label' => 'Products', 'url' => ['/products']];
    $menuItems[] = ['label' => 'Users', 'url' => ['/user']];
        
    /*    
    $tables = [
        ['label' => 'Users', 'url' => ['/user']],
        ['label' => 'Products', 'url' => ['/products']],
        ['label' => 'Ballasts', 'url' => ['/ballasts']],
        ['label' => 'Install time', 'url' => ['/installtime']],
        ['label' => 'Repair', 'url' => ['/repair']],
        ['label' => 'Coloring', 'url' => ['/coloring']],
        ['label' => 'Prices', 'url' => ['/prices']],
        
        
    ];
    */
    
    //$tables[] = ['label' => $p['page'], 'url' => $p['page_url']];
    //$menuItems[] = ['label' => 'Manage Data', 'items' =>$tables];
        }
    
    
    
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        
        

         
        
        
        
        
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->firstname . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <?php /*<p class="float-right"><?= Yii::powered() ?></p>*/ ?>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
