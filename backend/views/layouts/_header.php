<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-md navbar-light bg-light fixed-top shadow',
    ],
]);
$menuItems = [
    ['label' => 'Create', 'url' => ['/video/create']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
}     
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ms-auto mb-2 mb-md-0 '],
    'items' => $menuItems,
]);

if (Yii::$app->user->isGuest) {
    echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
} else {
       echo  $this->render('_dropDown');
}
NavBar::end();

?>
