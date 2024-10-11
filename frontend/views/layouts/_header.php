<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\helpers\Url;

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
?>

<form action = '<?php echo Url::to(['/video/search', ]) ?>' class="d-flex" role="search">
      <input class="form-control me-1 w-75" type="search" placeholder="Search" aria-label="Search" name = "keyword" required>
      <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<?php 
   
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ms-auto mb-2 mb-md-0 '],
]);
if (Yii::$app->user->isGuest) {
    echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    echo Html::tag('div',Html::a('Signup',['/site/signup'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
} else {
    echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout text-decoration-none']
        )
        . Html::endForm();
}
NavBar::end();
?>
