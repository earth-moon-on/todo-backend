<?php

namespace App\Todo;

use Illuminate\Http\Request;

interface TaskTodoInterface
{
    public function getAllTask();
    public function getTask($id_category);
    public function getOneTask($id, $id_category);
    public function addTask(Request $request, $id_category);
    public function updateTask(Request $request, $id, $id_category);
    public function deleteTask($id_category, $id);
    public function deleteTaskOne($id);
    public function searchTask($task);
}
