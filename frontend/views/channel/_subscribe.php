<?php
use yii\helpers\Url;
/** @var $channel \common\models\User */
?>

<div class="d-flex flex-row align-content-center justify-content-sm-between">
    <div class="subs">
        <?php echo $channel->getSubscribers()->count() ?> Subscribers
    </div>

    <a class="btn <?php echo $channel->isSubscribed(Yii::$app->user->id) ? 'btn-secondary' : 'btn-danger' ?>"
       href="<?php echo Url::to(['channel/subscribe', 'username' => $channel->username]) ?>"
       data-method="post" data-pjax="1">

        <?php if ($channel->isSubscribed(Yii::$app->user->id)): ?>
            <div class="sub">Subscribed <i class="fa-solid fa-check"></i></div>
        <?php else: ?>
            <div class="sub">Subscribe <i class="far fa-bell"></i></div>
        <?php endif; ?>
        
    </a>
</div>
