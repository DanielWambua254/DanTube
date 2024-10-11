<?php
use yii\helpers\Url;

/** @var $this \yii\web\View */
/** @var $channel \common\models\User */
/**@var $dataProvider \yii\data\ActiveDataProvider */
$this->title = 'Channel | ' .  $channel->username . ' ' . Yii::$app->name;
?>

<div class="jumbotron">
    <h1 class="display-4"><?php echo $channel->username ?></h1>
    <hr class = "my-4">
    <?php \yii\widgets\Pjax::begin() ?>
    <?php echo $this->render('_subscribe', [
        'channel' => $channel
    ]) ?>
    
    <?php \yii\widgets\Pjax::end() ?>

</div>
<hr class = "my-4">
<div class="title p-2">
    <h4><?php echo $channel->username ?> Videos.</h4>
</div>
<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => \yii\bootstrap5\LinkPager::class,
    ],
    'itemView' => '_video_item',
    'layout' => '<div class="d-flex flex-column align-content-center justify-content-evenly flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
]) ?>