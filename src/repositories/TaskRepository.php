<?php

namespace app\src\repositories;

use app\src\entities\Task;
use app\src\forms\Task\TaskEditForm;
use DomainException;
use RuntimeException;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Expression;

class TaskRepository
{
    public function getOneById($id): Task
    {
        if ($model = Task::findOne($id)) return $model;
        throw new DomainException('Task not found');
    }

    public function getDataProvider(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => Task::find()->orderBy(['priority' => SORT_DESC]),
            'pagination' => ['pageSize' => 10, 'defaultPageSize' => 10]
        ]);
    }

    public function save(Task $task): void
    {
        if (!$task->save()) {
            throw new RuntimeException('Saving error.');
        }
    }

    public function lockedSave(TaskEditForm $form)
    {
        $data = [
            'title' => $form->title,
            'priority' => $form->priority,
            'done' => $form->done,
            'version' => new Expression('version + 1'),
        ];
        $success = Yii::$app->db->createCommand()
            ->update(Task::tableName(), $data, ['id' => $form->id, 'version' => $form->version])
            ->execute();
        if (!$success) throw new DomainException('Concurrent editing error');
    }

    public function deleteById($id)
    {
        Task::findOne($id)->delete();
    }

}