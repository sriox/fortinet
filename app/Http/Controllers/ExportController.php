<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityType;
use App\Department;
use App\Se;
use App\Country;
use App\Technology;
use App\User;
use App\Carrier;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExportController extends Controller
{
    public function index()
    {
        $years = DB::select('CALL USP_GET_YEARS');
        $territories = DB::select('CALL USP_GET_TERRITORIES');
        return view('reports.export', [
            'activityTypes' => ActivityType::all(),
            'departments' => Department::all(),
            'ses' => Se::all(),
            'countries' => Country::all(),
            'technologies' => Technology::all(),
            'users' => User::all(),
            'carriers' => Carrier::all(),
            'years' => $years,
            'territories' => $territories
        ]);
    }

    public function download(Request $request)
    {


        $activitiesRaw = DB::select('CALL USP_GET_ACTIVITIES_TO_EXPORT(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            (int)$request->input('activity_type_id'),
            (int)$request->input('carrier_id'),
            (int)$request->input('country_id'),
            (int)$request->input('department_id'),
            (int)$request->input('se_id'),
            (int)$request->input('technology_id'),
            (int)$request->input('user_id'),
            (int)$request->input('year'),
            (int)$request->input('quarter'),
            (string)$request->input('territory'),
            (string)$request->input('dateIni'),
            (string)$request->input('dateEnd'),
        ]);

        $activities = $this->dataToArray($activitiesRaw);

        // $activities = $this->dataToArray(DB::select('CALL `fortinet`.`USP_GET_ACTIVITIES_TO_EXPORT`(0, 0, 0, 0, 0, 0, 0)'));

        // dd($activities);

        $name = $this->createName('Activities');

        \Excel::create($name, function($excel) use($activities){
            $excel->sheet('Data', function($sheet) use($activities){
                $sheet->fromArray($activities, null, 'A1', false, false);
            });
        })->download();
    }

    private function createName($baseName){
        $now = Carbon::now();
        return $baseName.'-'.$now->year.$now->month.$now->day.$now->hour.$now->minute.$now->second;
    }

    private function dataToArray($objData)
    {
        $data = [];
        $data[] = ['Activity', 'Country', 'Territory', 'SE', 'Carrier', 'Technology', 'Department', 'Member', 'Date', 'Quarter', 'Smart Ticket', 'Customer', 'Description', 'Activity Executed', 'Time Used'];
        foreach($objData as $row){
            $data[] = json_decode(json_encode($row), true);
        }
        return $data;
    }
}
