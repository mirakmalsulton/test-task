<?php

namespace app\tests\functional;

use app\src\entities\Task;
use app\src\repositories\TaskRepository;
use FunctionalTester;

class TaskApiCest
{
    public function testTaskDoneEndpoint(FunctionalTester $I, TaskRepository $taskRepository)
    {
        $task = Task::make('My title', 0, false);
        $taskRepository->save($task);

        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/json');

        $I->sendPut('/tasks/' . $task->id . '/done', ['done' => true]);
        $I->seeResponseContainsJson(['success' => true]);
        $I->sendGet('/tasks/' . $task->id);
        $I->seeResponseContainsJson(['done' => true]);

        $I->sendPut('/tasks/' . $task->id . '/done', ['done' => false]);
        $I->seeResponseContainsJson(['success' => true]);
        $I->sendGet('/tasks/' . $task->id);
        $I->seeResponseContainsJson(['done' => false]);
    }
}