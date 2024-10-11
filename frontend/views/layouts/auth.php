<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php');
?>
<main class=" main pt-3 d-flex flex-row h-100 mt-5 pl-2 pr-2 d-flex">
    <div class="content p-3 shadow h-100" style = "margin-left:20px"">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<?php $this->endContent() ?>