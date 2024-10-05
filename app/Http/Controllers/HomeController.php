<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('home', compact('widget'));
    }

    /**
     * Display the dashboard with recent companies chart.
     *
     * @return \Illuminate\View\View
     */
    public function recentCompaniesChart()
    {
        $companies = DB::table('companies')
            ->selectRaw('EXTRACT(DOW FROM created_at) as day_of_week, TO_CHAR(created_at, \'Day\') as day_name, COUNT(*) as count')
            ->groupBy('day_of_week', 'day_name')
            ->orderBy('day_of_week')
            ->get();

        $formattedData = [];

        $daysMap = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday'
        ];

        foreach ($companies as $company) {
            $dayOfWeek = intval($company->day_of_week); 
            $formattedData[] = [
                'day' => $daysMap[$dayOfWeek], 
                'count' => $company->count
            ];
        }

        return view('partials.dashboard', ['companyData' => $formattedData]);
    }
}
