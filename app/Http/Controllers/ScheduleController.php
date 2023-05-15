<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = request()->input('page');

        if (!$page) {
            $page = 0;
        }

        $yyyy = date('Y', strtotime("+$page month"));
        $mm = date('m', strtotime("+$page month"));
        $days = date('d', mktime(0, 0, 0, date('m')+($page+1), 0, date('Y')));

        // $schedules = Schedule::where('yyyymmdd', 'LIKE', $yyyy.'-'.$mm.'-%')->get();

        // $user = User::find(1);

        $schedules = DB::table('schedules as s')
                        ->select(
                            's.id as sche_id',
                            's.title',
                            's.yyyymmdd',
                            's.user_id',
                            's.created_at',
                            's.updated_at',
                            'u.name as user_name'
                        )
                        ->leftJoin('users as u', 's.user_id', '=', 'u.id')
                        ->get();

        return view('sche_index', compact('page', 'yyyy', 'mm', 'days', 'schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
