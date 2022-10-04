<?php

namespace tests\unit\models;

use app\src\entities\Task;
use Codeception\Specify;

class TaskTest extends \Codeception\Test\Unit
{
    use Specify;

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

    }
}
