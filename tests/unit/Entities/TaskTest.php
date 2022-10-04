<?php

namespace app\tests\unit\Entities;

use app\src\entities\Task;
use Codeception\Test\Unit;

class TaskTest extends Unit
{
    public function testValidTaskCreated()
    {
        $task = Task::make($title = 'My title', $priority = 0, $done = false);

        verify($task->title)->notNull();
        verify($task->title)->equals($title);
        verify($task->title)->string();

        verify($task->priority)->notNull();
        verify($task->priority)->equals($priority);
        verify($task->priority)->int();

        verify($task->done)->notNull();
        verify($task->done)->equals($done);
        verify($task->done)->bool();

        verify($task->version)->notNull();
        verify($task->version)->equals(0);
        verify($task->version)->int();

    }

    public function testDone()
    {
        $task = Task::make('My title', 0, false);
        $task->done();
        verify($task->done)->true();

        $task->unDone();
        verify($task->done)->false();
    }
}
