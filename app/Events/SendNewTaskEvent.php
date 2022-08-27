<?php

namespace App\Events;

use App\Models\Task;
use Illuminate\Queue\SerializesModels;


class SendNewTaskEvent
{
    use SerializesModels;

    public $booktasking;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }
}