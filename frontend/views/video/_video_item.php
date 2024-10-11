<?php


use yii\helpers\Url;
use yii\helpers\Html;

/** @var $model \common\models\Video */
?>

<div class="card m-3" style="width: 14rem;">
    <a href="<?php echo Url::to(['/video/view', 'video_id' => $model->video_id]) ?>" class="w-100">
        <div class="ratio ratio-16x9 mr-2 w-100">
            <video class="embed-responsive-item w-100"
                   poster="<?php echo $model->getThumbnailLink() ?>"
                   src="<?php echo $model->getVideoLink() ?>">
                </video>
        </div>
    </a>
    <div class="card-bod p-2">
        <h6 class="card-title m-0"><?php echo $model->title ?></h6>
        <p class="text-muted card-text m-0 text-black">
        <?php echo Html::a($model->createdBy->username, [
                    'channel/view', 'username'=>$model->createdBy->username
                ]) ?>
        </p>
        <p class="text-muted card-text m-0">
            <?php echo $model->getViews()->count() ?>  views • 
            <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
        </p>
    </div>
</div>
