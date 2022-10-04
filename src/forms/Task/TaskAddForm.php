<?php

namespace app\src\forms\Task;

use yii\base\Model;

class TaskAddForm extends Model
{
    public string $title = '';
    public int $priority = 0;
    public bool $done = false;

    public function rules(): array
    {
        return [
            [['title', 'priority', 'done'], 'required', 'message' => 'Заполните поле'],
            [['title'], 'string'],
            [['priority'], 'integer'],
            [['done'], 'boolean'],
        ];
    }

}