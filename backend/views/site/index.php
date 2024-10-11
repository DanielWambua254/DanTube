<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

/** @var $latestVideo \common\models\Video */
/** @var $numberOfViews integer */
/** @var $numberOfSubscribers integer */
/** @var $latestSubscribers \common\models\Subscriber[] */


$this->title = 'Dashboard';
?> <h1>Dashboard</h1>
<div class="site-index d-flex justify-content-between">

<div class="card" style="width: 16rem;">
        <a href="<?php echo Url::to(['/video/view', 'video_id' => $latestVideo->video_id]) ?>" class="w-100">
            <div class="ratio ratio-16x9 mr-2 w-100">
                <video class="embed-responsive-item w-100"
                    poster="<?php echo $latestVideo->getThumbnailLink() ?>"
                    src="<?php echo $latestVideo->getVideoLink() ?>">
                </video>
            </div>
        </a>
        <div class="card-body">
            <h6><?php echo $latestVideo->title ?></h6>
            <p class="card-text"> <?php echo Yii::$app->formatter->asRelativeTime($latestVideo->created_at) ?> </p>
            <p class="card-text"> Likes <?php echo $latestVideo->getLikes()->count() ?> • Views <?php echo $latestVideo->getViews()->count() ?> </p>
            <a href="<?php echo Url::to(['/videos/update', 'video_id' => $latestVideo->video_id]) ?>" class="btn btn-primary"> Edit Video</a>
        </div>
    </div>
    <div class="card" style="width: 16rem;">

        <div class="card-body">
            <h6 class="card-title">Total Views</h6>
            <p class="card-text" style="font-size: 48px"><?php echo $numberOfViews ?></p>
        </div>
    </div>
    <div class="card" style="width: 16rem;">

        <div class="card-body">
            <h6 class="card-title">Total Subscribers</h6>
            <p class="card-text" style="font-size: 48px"><?php echo $numberOfViews ?></p>
        </div>
    </div>

    <div class="card" style="width: 16rem;">
        <div class="card-body">
            <h6 class="card-title">Latest Subscribers</h6>
            <?php foreach ($latestSubscribers as $subscriber): ?>
                <P>• <?php echo $subscriber->user->username ?></P>
            <?php endforeach; ?>
        </div>
    </div>
</div>