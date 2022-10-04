<?php
/** @var $model */

/** @var $dataProvider */

use yii\grid\GridView;
use yii\helpers\Html;

?>

<div class="row mb-3">
    <div class="col-lg-12">
        <div class="d-flex">
            <div>
                <?= Html::a('Add new', ['/main/add'], ['class' => 'btn btn-primary btn-sm']) ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'title',
                    'label' => 'Title',
                ],

                [
                    'attribute' => 'priority',
                    'label' => 'Priority',
                ],

                [
                    'attribute' => 'done',
                    'label' => 'Status',
                    'format' => 'html',
                    'value' => function ($model) {
                        if ($model->done) {
                            return "<span class='text-success'>Done</span>";
                        } else {
                            return "<span class='text-secondary'>Undone</span>";
                        }
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('Edit', ['/main/edit', 'id' => $model->id], [
                                'class' => 'btn btn-primary btn-sm',
                            ]);
                        },

                        'delete' => function ($url, $model) {
                            return Html::a('Delete', ['/main/delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger btn-sm',
                                'data' => [
                                    'confirm' => 'Are you sure?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                    ]
                ],
            ],
        ]) ?>
    </div>
</div>