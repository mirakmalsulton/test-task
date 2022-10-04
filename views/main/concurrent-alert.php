<?php

/** @var $model app\src\forms\Task\TaskEditForm */

/** @var $message */

use yii\helpers\Html;

?>

<div class="alert alert-danger">
    <h5><?= $message ?></h5>
    <?php if ($model) : ?>
        <?= Html::a('Edit again', ['/main/edit', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    <?php endif ?>
    <?= Html::a('Cancel', ['/main/index'], ['class' => 'btn btn-danger btn-sm']) ?>
</div>