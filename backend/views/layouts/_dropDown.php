<?php

/** @var \yii\web\View $this */
/** @var string $content */
/** @var yii\bootstrap5\ActiveForm $form */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
?>

<div class="btn-group ms-3">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo Yii::$app->user->identity->username ?>
    </button>
    <ul class="dropdown-menu">
        <li class = "d-flex flex-row align-items-center" >
        <i class="fa fa-cog ps-2" aria-hidden="true"></i>
            <?php
            echo Nav::widget(
                [
                    'options' => [
                        'class' => 'dropdown-item'
                    ],
                    'items' => [
                        [
                            'label' => 'Account',
                            'url' => ['account/index'],
                        ]
                    ]
                ]
            )
            ?>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        <li class = "d-flex flex-row align-items-center" >
            <i class="fa fa-sign-out ps-2" aria-hidden="true"></i>
            <?php echo Html::beginForm(['/site/logout'], 'post')

                . Html::submitButton('LogOut', ['class' => 'dropdown-item'])

                . Html::endForm(); ?>
        </li>


    </ul>
</div>