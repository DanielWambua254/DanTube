<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Video $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="video-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'video_id' => $model->video_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'video_id' => $model->video_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'attribute' => 'video_id',
            'format' => 'raw',
            'value' => function ($model) {
                return Yii::$app->view->render('_video_item', ['model' => $model]);
            }
        ],
        'title',
        'description:ntext',
        'video_name',
        'tags',
        [
            'attribute' => 'status',
            'value' => function ($model) {
                $statusLabels = $model->getStatusLabels();
                return isset($statusLabels[$model->status]) ? $statusLabels[$model->status] : 'Unknown Status';
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
    ],
]) ?>


</div>
