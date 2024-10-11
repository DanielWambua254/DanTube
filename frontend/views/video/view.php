<?php
/**
 * User: TheCodeholic
 * Date: 4/18/2020
 * Time: 8:48 AM
 */

use yii\helpers\Html;
use yii\helpers\Url;

/** @var $this \yii\web\View */
/** @var $model \common\models\Video */
/** @var $similarVideos \common\models\Video[] */
/** @var $comments \common\models\Comment[] */

$this->title = $model->title . ' | ' . Yii::$app->name;
?>

<div class="row">
    <div class="col-sm-8">
        <div class="ratio ratio-16x9">
            <video class="embed-responsive-item" poster="<?php echo $model->getThumbnailLink() ?>"
                src="<?php echo $model->getVideoLink() ?>" controls></video>
        </div>
        <h6 class="mt-2"><?php echo Html::encode($model->title) ?></h6>

        <div class="d-flex justify-content-between align-items-center">
            <div>
                <?php echo $model->getViews()->count() ?> views •
                <?php echo Yii::$app->formatter->asDate($model->created_at) ?>
            </div>
            <div>
                <?php \yii\widgets\Pjax::begin() ?>
                <?php echo $this->render('_buttons', [
                    'model' => $model
                ]) ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>

        <div>
            <h6 class="mt-2">
                <?php echo Html::a($model->createdBy->username, [
                    'channel/view',
                    'username' => $model->createdBy->username
                ]) ?>
            </h6>
            <?php echo Html::encode($model->description) ?>
        </div>
    </div>

    <div class="col-sm-4">
        <h6>Similar videos</h6>
        <?php foreach ($similarVideos as $key => $similarVideo): ?>
            <div class="media mb-3 d-flex flex-row mt-2">
                <a href="<?php echo Url::to(['/video/view', 'video_id' => $similarVideo->video_id]) ?>" style="flex: 1">
                    <div class="me-3" style="flex: 1">
                        <div class="ratio ratio-16x9">
                            <video class="embed-responsive-item" poster="<?php echo $similarVideo->getThumbnailLink() ?>"
                                src="<?php echo $similarVideo->getVideoLink() ?>" muted></video>
                        </div>
                    </div>
                </a>

                <div class="media-body" style="flex: 1">
                    <h6 class="m-0"><?php echo Html::encode($similarVideo->title) ?></h6>
                    <div class="text-muted">
                        <p>
                            <?php echo Html::a($similarVideo->createdBy->username, [
                                'channel/view',
                                'username' => $similarVideo->createdBy->username
                            ]) ?>
                        </p>
                        <small>
                            <p class="text-muted">
                                <?php echo $similarVideo->getViews()->count() ?> views •
                                <?php echo Yii::$app->formatter->asRelativeTime($similarVideo->created_at) ?>
                            </p>
                        </small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
