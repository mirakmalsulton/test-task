<?php

/** @var $title */

/** @var $model app\src\forms\Task\TaskEditForm */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = $title;

?>

<div class="row">
    <div class="col-lg-12">
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'title')->label('Title') ?>
        <?= $form->field($model, 'priority')->textInput()->label('Priority') ?>
        <?= $form->field($model, 'done')->checkbox()->label('Done'); ?>
        <?= $form->field($model, 'version')->hiddenInput()->label(false); ?>

        <div class="d-flex">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm me-1']) ?>
            <?= Html::a('Cancel', ['/main/index'], ['class' => 'btn btn-danger btn-sm me-auto']) ?>
            <?= Html::a('Delete', ['/main/delete', 'id' => $model->id], [
                'class' => 'btn btn-secondary btn-sm',
                'data' => [
                    'confirm' => 'Confirm?',
                    'method' => 'post',
                ],
            ]); ?>
        </div>



        <?php ActiveForm::end() ?>
    </div>
</div>