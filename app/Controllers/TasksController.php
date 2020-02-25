<?php

namespace App\Controllers;

use App\Helpers\Redirect;
use App\Helpers\Validator;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Views\View;
use Illuminate\Routing\Controller;

class TasksController extends Controller
{

    public function add()
    {
        return View::render('new');
    }

    public function create(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required'
        ];

        $validate = Validator::validate($request, $rules);

        if ($validate['status'] !== 'success') {

            return View::render('new', ['errors' => $validate['errors']]);
        }

        Task::create([
           'name' =>  $request->name,
            'email' => $request->email,
            'content' => htmlspecialchars($request->text)
        ]);

        return View::render('new', ['notice' => 'Task added successfully']);

    }

    public function edit($id)
    {
        $task = Task::where('id', $id)->first();

        return View::render('edit', compact('request', 'task'));
    }

    public function update($id, Request $request)
    {


        $notice = 'Task updated successfully';
        $errors = [];

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required'
        ];

        $validate = Validator::validate($request, $rules);

        if ($validate['status'] !== 'success') {

            return View::render('edit', compact('request', 'task', 'notice', 'errors'));
        }

        $task = Task::find($id);

        $task->update([
            'name' =>  $request->name,
            'email' => $request->email,
            'content' => htmlspecialchars($request->text),
            'status' => $request->status ? 1 : 0,
            'edited' => $task->content !== $request->text ? 1 : 0
        ]);

        Redirect::to('/dashboard/task/' . $id );
    }

}
