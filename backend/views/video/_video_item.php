<?php


/** @var $model \common\models\Video */

use \yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<div class=" d-flex flex-row flex-wrap ">
    <a href="<?php echo Url::to(['/video/update', 'video_id' => $model->video_id]) ?>" class = "p-1">
        <div class="ratio ratio-16x9 mr-2"  style="width: 120px; flex:1;">
                <video class="embed-responsive-item"
                   poster="<?php echo $model->getThumbnailLink() ?>"
                   src="<?php echo $model->getVideoLink() ?>">
                </video>
        </div>
    </a>
    <div class="media-body p-1" style="height: 84px; flex: 3;">
        <h6 class="mt-0"><?php echo $model->title ?></h6>
        <?php echo StringHelper::truncateWords($model->description, 10) ?>
    </div>
</div>
