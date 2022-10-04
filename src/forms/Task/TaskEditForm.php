<?php

namespace app\src\forms\Task;

use app\src\entities\Task;
use yii\base\Model;

class TaskEditForm extends Model
{
    public int $id = 0;
    public string $title = '';
    public int $priority = 0;
    public bool $done = false;
    public int $version = 0;

    public function __construct(Task $task, $config = [])
    {
        parent::__construct($config);

        $this->id = $task->id;
        $this->title = $task->title;
        $this->priority = $task->priority;
        $this->done = $task->done;
        $this->version = $task->version;
    }

    public function rules(): array
    {
        return [
            [['id', 'title', 'priority', 'done'], 'required', 'message' => 'Заполните поле'],
            [['id'], 'integer'],
            [['title'], 'string'],
            [['priority'], 'integer'],
            [['done'], 'boolean'],
            [['version'], 'integer'],
        ];
    }
}