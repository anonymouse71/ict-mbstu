<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Requests;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Models\ResearchArea;
use App\Models\ResearchGroup;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	/**
	 * Show dashboard
	 *
	 * @return Response
	 */
    public function index()
    {
		$faculty       = Faculty::count();
		$researchGroup = ResearchGroup::count();
		$researchArea  = ResearchArea::count();
		$news          = News::count();

    	return view('admin.pages.dashboard', compact('faculty', 'researchGroup', 'researchArea', 'news'));
    }
}
