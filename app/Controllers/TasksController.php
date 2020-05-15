<?php

namespace App\Controllers;

use App\Helpers\Auth;
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

            return View::render('new', ['errors' => $validate['errors'], 'request' => $request]);
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
        Auth::checkAuthenticated();

        $task = Task::where('id', $id)->first();
        $notice = '';

        if (isset($_COOKIE['notice'])) {
            $notice = $_COOKIE['notice'];
            setcookie("notice", "", time()-3600, $_SERVER['REQUEST_URI']);
        }

        return View::render('edit', compact('task', 'notice'));
    }

    public function update($id, Request $request)
    {


        Auth::checkAuthenticated();

        $notice = 'Task updated successfully';
        $errors = [];

        $task = Task::find($id);

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required'
        ];

        $validate = Validator::validate($request, $rules);

        if ($validate['status'] !== 'success') {

            $errors = $validate['errors'];
            return View::render('edit', compact('request', 'task', 'errors'));
        }

        $task->update([
            'name' =>  $request->name,
            'email' => $request->email,
            'content' => htmlspecialchars($request->text),
            'status' => $request->status ? 1 : 0,
            'edited' => $task->content !== $request->text ? 1 : 0
        ]);

        Redirect::with(['notice' => $notice], '/dashboard/task/' . $id);
    }

}
