<?php

namespace App\Controllers;

use App\Helpers\Redirect;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Views\View;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {

        if (isset($_GET['page']) && $_GET['page'] == 1) {
            Redirect::to('/');
        }

        $limit = 3;

        $skip = isset($_GET['page']) ? 3 * ($_GET['page'] - 1) : 0;

        $tasks = Task::take(3)->skip($skip)->get();

        $tasksCount = Task::all()->count();

        $paginationCount = ceil($tasksCount/$limit);

        return View::render('index', compact('tasks', 'paginationCount'));

    }

    public function sortBy($field, $param)
    {

        $limit = 3;
        $skip = isset($_GET['page']) ? 3 * ($_GET['page'] - 1) : 0;

        $tasks = Task::orderBy($field, $param)->take(3)->skip($skip)->get();

        $tasksCount = Task::all()->count();

        $paginationCount = ceil($tasksCount/$limit);

        return View::render('index', compact('tasks', 'paginationCount'));
    }

}
