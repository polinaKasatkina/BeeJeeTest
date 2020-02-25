<?php

namespace App\Controllers;

use App\Models\Task;
use Illuminate\Routing\Controller;
use App\Views\View;

class AdminController extends Controller
{


    public function index()
    {
        $tasks = Task::all();

        return View::render('dashboard', compact('tasks'));

    }

}
