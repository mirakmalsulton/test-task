<?php

namespace app\controllers;

use app\src\forms\Task\TaskAddForm;
use app\src\forms\Task\TaskEditForm;
use app\src\repositories\TaskRepository;
use app\src\useCases\TaskAddService;
use DomainException;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class MainController extends Controller
{
    private TaskAddService $taskAddService;
    private TaskRepository $taskRepository;

    public function __construct($id, $module, TaskAddService $taskAddService, TaskRepository $taskRepository)
    {
        parent::__construct($id, $module);

        $this->taskAddService = $taskAddService;
        $this->taskRepository = $taskRepository;
    }

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = $this->taskRepository->getDataProvider();
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionAdd()
    {
        $form = new TaskAddForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $this->taskAddService->add($form);
            Yii::$app->session->setFlash('success', Yii::t('app', 'Task added successfully'));
            return $this->redirect('index');
        }

        return $this->render('add', ['model' => $form]);
    }

    public function actionEdit($id)
    {
        $task = $this->taskRepository->getOneById($id);
        $form = new TaskEditForm($task);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->taskAddService->edit($form);
            } catch (DomainException $e) {
                return $this->render('concurrent-alert', ['model' => $form]);
            }
            Yii::$app->session->setFlash('success', Yii::t('app', 'Task saved successfully'));
            return $this->redirect('index');
        }

        return $this->render('edit', ['model' => $form]);
    }

    public function actionDelete($id)
    {
        $this->taskRepository->deleteById($id);
        Yii::$app->session->setFlash('success', Yii::t('app', 'Task deleted successfully'));
        return $this->redirect('/main/index');
    }

    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
