<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DigitalReport;
use Illuminate\Http\Request;

class DigitalReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $digitalreports = DigitalReport::where('start', 'LIKE', "%$keyword%")
                ->orWhere('end', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $digitalreports = DigitalReport::paginate($perPage);
        }

        return view('admin.digital-reports.index', compact('digitalreports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.digital-reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $country_report = json_decode($request->country_report, true);
        $actions_overview = json_decode($request->actions_overview, true);
        $people_overview = json_decode($request->people_overview, true);

        DigitalReport::create([
            'project_id' => $request->project_id,
            'start' => $request->start,
            'end' => $request->end,
            'video_link' => $request->video_link,
            'actions_overview' => $actions_overview,
            'people_overview' => $people_overview,
            'country_report' => $country_report
        ]);

        return redirect('admin/digital-reports')->with('flash_message', 'DigitalReport added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $digitalreport = DigitalReport::findOrFail($id);

        return view('admin.digital-reports.show', compact('digitalreport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $digitalreport = DigitalReport::findOrFail($id);

        return view('admin.digital-reports.edit', compact('digitalreport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $digitalreport = DigitalReport::findOrFail($id);


        $country_report = json_decode($request->country_report, true);
        $actions_overview = json_decode($request->actions_overview, true);
        $people_overview = json_decode($request->people_overview, true);

        $digitalreport->update([
            'project_id' => $request->project_id,
            'start' => $request->start,
            'end' => $request->end,
            'video_link' => $request->video_link,
            'actions_overview' => $actions_overview,
            'people_overview' => $people_overview,
            'country_report' => $country_report
        ]);


        return redirect('admin/digital-reports')->with('flash_message', 'DigitalReport updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        DigitalReport::destroy($id);

        return redirect('admin/digital-reports')->with('flash_message', 'DigitalReport deleted!');
    }
}
