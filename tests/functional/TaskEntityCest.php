<?php

namespace app\tests\functional;

use app\src\entities\Task;
use app\src\forms\Task\TaskEditForm;
use app\src\repositories\TaskRepository;
use DomainException;
use FunctionalTester;

class TaskEntityCest
{
    public function testLockedSaving(FunctionalTester $I, TaskRepository $taskRepository)
    {
        $task = Task::make('My title', 0, false);
        $task->save();
        $taskRepository->save($task);

        $form_1 = new TaskEditForm($task);
        $form_2 = new TaskEditForm($task);

        $taskRepository->lockedSave($form_1);
        $I->expectThrowable(new DomainException('Concurrent editing error'), function () use ($taskRepository, $form_2) {
            $taskRepository->lockedSave($form_2);
        });
    }
}