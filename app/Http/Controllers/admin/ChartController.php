<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function getRecentChartsData()
    {
        $companies = DB::table('companies')
            ->selectRaw('EXTRACT(DOW FROM created_at) as day_of_week, TO_CHAR(created_at, \'Day\') as day_name, COUNT(*) as count')
            ->groupBy('day_of_week', 'day_name')
            ->orderBy('day_of_week')
            ->get();

        $daysMap = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday'
        ];

        $formattedCompanyData = [];
        foreach ($companies as $company) {
            $dayOfWeek = intval($company->day_of_week);
            $formattedCompanyData[] = [
                'day' => $daysMap[$dayOfWeek],
                'count' => $company->count
            ];
        }

        $employees = DB::table('employees')
            ->selectRaw('EXTRACT(DOW FROM created_at) as day_of_week, TO_CHAR(created_at, \'Day\') as day_name, COUNT(*) as count')
            ->groupBy('day_of_week', 'day_name')
            ->orderBy('day_of_week')
            ->get();

        $formattedEmployeeData = [];
        foreach ($employees as $employee) {
            $dayOfWeek = intval($employee->day_of_week);
            $formattedEmployeeData[] = [
                'day' => $daysMap[$dayOfWeek],
                'count' => $employee->count
            ];
        }

        return view('partials.charts', [
            'companyData' => $formattedCompanyData,
            'employeeData' => $formattedEmployeeData
        ]);
    }
}
