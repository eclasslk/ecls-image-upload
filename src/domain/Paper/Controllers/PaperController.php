<?php

namespace domain\Paper\Controllers;

use App\Http\Controllers\Controller;
use domain\Paper\Models\Paper;
use Illuminate\View\View;

class PaperController extends Controller
{
    public function index():View
    {
        $papers = Paper::all();
        return view('papers.index', compact('papers'));
    }
}
