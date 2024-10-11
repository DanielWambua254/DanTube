<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Create Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex flex-column align-items-center justify-content-center">
        <div class="upload-icon">
            <i class="fa fa-upload" aria-hidden="true"></i>
        </div>
        <br />
        <p class="m-0">Click the button to select your video file.</p>
        <p class="text-muted">The video will be private until you publish it.</p>

        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>
        
        <button class="btn btn-primary btn-file">
            Select file
            <input class="file" type='file' id="videoFile" name="video" />
        </button>
        <?php ActiveForm::end(); ?>
    </div>
</div>
