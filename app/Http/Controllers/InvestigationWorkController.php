<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;

class InvestigationWorkController extends Controller
{
    public function index(): Response
    {
        return inertia('InvestigationWorks/Index');
    }

    public function create(): Response
    {
        return inertia('InvestigationWorks/Create');
    }
}
