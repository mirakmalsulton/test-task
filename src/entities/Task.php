<?php

namespace app\src\entities;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property int $priority
 * @property bool $done
 * @property bool $version
 */
class Task extends ActiveRecord
{
    public static function make(string $title, int $priority, bool $done): self
    {
        $task = new static();
        $task->title = $title;
        $task->priority = $priority;
        $task->done = $done;
        $task->version = 0;
        return $task;
    }

    public function done()
    {
        $this->done = true;
    }

    public function unDone()
    {
        $this->done = false;
    }

    public static function tableName(): string
    {
        return 'tasks';
    }
}