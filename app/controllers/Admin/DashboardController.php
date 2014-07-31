<?php namespace Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function getIndex()
    {
        return View::make('admin.dashboard');
    }
}