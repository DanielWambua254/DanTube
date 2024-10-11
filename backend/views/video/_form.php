<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
/* @var $form yii\bootstrap4\ActiveForm */

\backend\assets\TagsInputAsset::register($this);
?>

<div class="video-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="d-flex flex-row flex-wrap g-3">
        <div class="col-sm-8 p-2">

            <?php echo $form->errorSummary($model) ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => false]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

            <div class="form-group ">
                <label class = "mb-2"><?php echo $model->getAttributeLabel('thumbnail') ?></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input"
                           id="thumbnail" name="thumbnail">
                    <label class="custom-file-label" for="thumbnail">Choose file</label>
                </div>
            </div>

            <div class="mt-2">
                <?= $form->field($model, 'tags', [
                'inputOptions' => ['data-role' => 'tagsinput']
            ])->textInput(['maxlength' => true]) ?>
            </div>
            
            
        </div>
        <div class="col-sm-4 p-3">

            <div class="ratio ratio-16x9 mb-3 border-1 border-dark-subtle">
                <video class="embed-responsive-item"
                       poster="<?php echo $model->getThumbnailLink() ?>"
                       src="<?php echo $model->getVideoLink() ?>"
                       controls></video>
            </div>

            <div class="mb-3">
                <div class="text-muted">Video Link</div>
                <a href="<?php echo $model->getVideoLink() ?>">
                    Open Video
                </a>
            </div>

            <div class="mb-3">
                <div class="text-muted">Video Name</div>
                <?php echo $model->video_name ?>
            </div>

            <?= $form->field($model, 'status')->dropDownList($model->getStatusLabels()) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>