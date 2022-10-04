<?php

namespace app\controllers;

use app\src\repositories\TaskRepository;
use DomainException;
use Yii;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;

class TaskController extends Controller
{
    private TaskRepository $taskRepository;

    public function __construct($id, $module, TaskRepository $taskRepository)
    {
        parent::__construct($id, $module);
        $this->taskRepository = $taskRepository;
    }

    public function actionView($id)
    {
        return ArrayHelper::toArray($this->taskRepository->getOneById($id));
    }

    public function actionDone(): array
    {
        try {
            $task = $this->taskRepository->getOneById(Yii::$app->request->get('id'));
        } catch (DomainException $e) {
            return ['success' => false, 'message' => Yii::t('app', 'Task not found')];
        }

        if (Yii::$app->request->getBodyParam('done')) {
            $task->done();
        } else {
            $task->unDone();
        }

        $this->taskRepository->save($task);
        return ['success' => true, 'message' => Yii::t('app', 'Task updated successfully')];
    }
}