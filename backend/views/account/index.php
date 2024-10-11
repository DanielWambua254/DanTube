<?php

/** @var \yii\web\View $this */
/** @var string $content */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var common\models\Account $model */ 

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
?>

<div class=" d-flex flex-column align-content-center">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="banner d-flex flex-column justify-content-between" style="height: 200px; width: 100%; background-color: red;">
        <img alt="banner image" class="h-100 w-100" src="" />
        <button class="btn  btn-file">
            Select image
            <input class="file" type='file' id="thumbnail" name="video" />
        </button>
    </div>


    <div class="d-flex flex-row align-self-center justify-content-md-evenly  mt-2">
        <div class="border-1 border-secondary-subtle col-4  d-flex flex-column justify-content-between " style="height: 200px; width: 200px; border-radius: 50%; background-color: blue;">
            <img alt="profile image" class="h-100 w-100" src="https://yt3.googleusercontent.com/lkH37D712tiyphnu0Id0D5MwwQ7IRuwgQLVD05iMXlDWO-kDHut3uI4MgIEAQ9StK0qOST7fiA=s160-c-k-c0x00ffffff-no-rj" />
            <button class="btn  btn-file">
                Select image
                <input class="file" type='file' id="dp" name="video" />
            </button>
        </div>

        <div class="info col-8 d-flex flex-column align-self-start">
            <h3><?php echo Yii::$app->user->identity->username ?></h3>


           <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis porro vitae aperiam, aliquid sunt expedita veniam dolore fugit ex quis, incidunt culpa, nobis dicta maiores cum quasi dignissimos possimus!
           </p>
            <h6><?php echo Yii::$app->user->identity->email ?></h6>
            
            <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary w-25 ']) ?>
    </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>