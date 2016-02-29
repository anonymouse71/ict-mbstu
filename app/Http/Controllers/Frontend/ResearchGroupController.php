<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\ResearchGroup;
use App\Http\Controllers\Controller;

class ResearchGroupController extends Controller
{
    /**
     * Display a listing of the ResearchGroup.
     *
     * @return Response
     */
    public function index()
    {
        $active = 'research';
        $researchGroupList = ResearchGroup::with('coOrdinator')->get();

        return view('frontend.research_group.list', compact('active', 'researchGroupList'));
    }

    /**
     * Display the specified ResearchGroup.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $active = 'research';
        $researchGroup = ResearchGroup::with('coOrdinator')->findOrFail($id);

        return view('frontend.research_group.show', compact('active', 'researchGroup'));
    }

}
