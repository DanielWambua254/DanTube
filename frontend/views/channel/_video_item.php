<?php


use yii\helpers\Url;
use yii\helpers\Html;

/** @var $model \common\models\Video */
?>

<div class="d-flex flex-row flex-wrap m-3 ml-3" style="width: 100%; height: 260px; ">
    <a href="<?php echo Url::to(['/video/view', 'video_id' => $model->video_id]) ?>" style="width: 40%; height: 100%;">
        <div class="ratio ratio-16x9 p-2">
            <video class="embed-responsive-item w-100 h-100"
                   poster="<?php echo $model->getThumbnailLink() ?>"
                   src="<?php echo $model->getVideoLink() ?>" controls>
                </video>
        </div>
    </a>
    <div class="card-bod p-2" style="width: 60%; height: 100%; overflow: hidden; overflow-y: scroll; scroll-behavior: smooth;">
        <h6 class="card-title mb-1"><?php echo $model->title ?></h6>
        
        <p class="text-muted card-text m-0">
            <?php echo $model->getViews()->count() ?>  views • 
            <?php echo Yii::$app->formatter->asDate($model->created_at) ?>
        </p>
        <p class="text-muted card-text m-0">
            <?php echo $model->getLikes()->count() ?>  Likes <i class="fas fa-thumbs-up"></i> •  
            <?php echo $model->getDisLikes()->count() ?>  Dislikes <i class="fas fa-thumbs-down"></i> 
        </p>
        <p class="card-title mt-3"><?php echo $model->description ?><p/>
    </div>
</div>
