<?php

namespace app\src\useCases;

use app\src\entities\Task;
use app\src\forms\Task\TaskAddForm;
use app\src\forms\Task\TaskEditForm;
use app\src\repositories\TaskRepository;

class TaskAddService
{
    private TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function add(TaskAddForm $form)
    {
        $task = Task::make($form->title, $form->priority, $form->done);
        $this->taskRepository->save($task);
    }

    public function edit(TaskEditForm $form)
    {
        $this->taskRepository->lockedSave($form);
    }
}