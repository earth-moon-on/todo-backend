<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Todo\TaskTodoInterface;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    private $todo;

    public function __construct(TaskTodoInterface $todo)
    {
        $this->todo = $todo;
    }

    public function allTask()
    {
        $tasks = $this->todo->getAllTask();
        return $tasks;
    }

    public function index($id_category)
    {
        $tasks = $this->todo->getTask($id_category);
        return $tasks;
    }


    public function store(Request $request, $id_category)
    {
        $task = $this->todo->addTask($request, $id_category);
        return $task;
    }


    public function show($id_category, $id)
    {
        $task =  $this->todo->getOneTask($id, $id_category);
        return $task;
    }


    public function update(Request $request, $id, $id_category)
    {
        $task = $this->todo->updateTask($request, $id, $id_category);
        return $task;
    }


    public function destroy($id_category, $id)
    {
        $task = $this->todo->deleteTask($id_category, $id);
        return $task;
    }

    public function destroyTask($id)
    {
        $task = $this->todo->deleteTaskOne($id);
        return $task;
    }

    public function search($task)
    {
        $task_return = $this->todo->searchTask($task);
        return $task_return;
    }


}
