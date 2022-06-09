<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Patrol;
use App\Models\Report;
use App\Models\ReportForm;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        $report_forms = ReportForm::where('is_active', true)->get();
        $reports = Report::where('user_steam_hex', auth()->user()->steam_hex)->get();

        return view('portal.reports.index', compact('reports', 'report_forms'));
    }

    public function create(ReportForm $report_form)
    {
        // dd($reportForm->report_questions);

        $patrols = auth()->user()->patrol;
        $patrol_id = '';
        if (isset($_GET['patrol_id'])) {

            $patrol = Patrol::where('id', $_GET['patrol_id'])->where('user_steam_hex', auth()->user()->steam_hex)->limit(1)->get()->toArray();

            if ($patrol) {
                $patrol_id = $patrol[0]['id'];
            }
        }

        return view('portal.reports.create', compact('report_form', 'patrols', 'patrol_id'));
    }

    public function store(ReportForm $report_form, Request $request)
    {
        $questions = $report_form->report_questions;
        $rules = ['patrol_id' => ['numeric', 'present']];

        foreach ($questions as $question) {
            $name = strtolower(str_replace(' ', '_', $question->question));
            $rules += [
                $name => ['required'],
            ];
        }

        $answers = $request->validate($rules);

        $patrol_id = $answers['patrol_id'];
        unset($answers['patrol_id']);

        $patrol_id = ($patrol_id == 0) ? null : $patrol_id;

        $answers = json_encode($answers);

        Report::create([
            'user_steam_hex' => auth()->user()->steam_hex,
            'report_form_id' => $report_form->id,
            'answers' => $answers,
            'patrol_id' => $patrol_id
        ]);

        return redirect()->route('portal.patrols.index')->with('alert', ['message' => ['Report saved.'], 'level' => "success"]);
    }

    public function show(ReportForm $report_form, Report $report)
    {
        $report_questions = json_decode($report->answers);

        return view('portal.reports.show', compact('report', 'report_questions'));
    }
}
