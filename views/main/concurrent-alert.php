<?php

/** @var $model app\src\forms\Task\TaskEditForm */

use yii\helpers\Html;

?>

<div class="alert alert-danger">
    <h5>Conflict, item was changed by another user, your changes will be lost</h5>
    <?= Html::a('Edit again', ['/main/edit', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    <?= Html::a('Cancel', ['/main/index'], ['class' => 'btn btn-danger btn-sm']) ?>
</div>