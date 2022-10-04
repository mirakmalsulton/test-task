<?php

/** @var $title */
/** @var $model app\src\forms\Task\TaskAddForm */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = $title;

?>

<div class="row">
    <div class="col-lg-12">
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($model, 'title')->label('Title') ?>
        <?= $form->field($model, 'priority')->textInput()->label('Priority') ?>
        <?= $form->field($model, 'done')->checkbox()->label('Done'); ?>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm']) ?>
        <?= Html::a('Cancel', ['/main/index'], ['class' => 'btn btn-danger btn-sm']) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>