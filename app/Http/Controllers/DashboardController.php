<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Finance;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }

    public function attendanceReport(Request $request)
    {
        $year = $request->input('year', Carbon::now()->year); // Default to the current year if no year is selected

        $attendanceData = Attendance::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(men + women + children) as total')
            ->whereYear('date', $year)
            ->groupBy('year', 'month')
            ->get()
            ->map(function ($item) {
                return [
                    'year' => $item->year,
                    'month' => Carbon::create()->month($item->month)->format('F'),
                    'total' => $item->total
                ];
            });

        $years = Attendance::selectRaw('YEAR(date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('attendance_report', compact('attendanceData', 'years', 'year'));
    }

    public function financialReport(Request $request)
    {
        $year = $request->input('year', Carbon::now()->year); // Default to the current year if no year is selected

        $incomeData = Finance::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(amount) as total')
            ->where('type', 'income')
            ->whereYear('date', $year)
            ->groupBy('year', 'month')
            ->get()
            ->keyBy('month');

        $expenseData = Finance::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(amount) as total')
            ->where('type', 'expense')
            ->whereYear('date', $year)
            ->groupBy('year', 'month')
            ->get()
            ->keyBy('month');

        $months = collect(range(1, 12))->map(function ($month) use ($incomeData, $expenseData) {
            return [
                'month' => Carbon::create()->month($month)->format('F'),
                'income' => $incomeData->get($month)->total ?? 0,
                'expense' => $expenseData->get($month)->total ?? 0,
            ];
        });

        $years = Finance::selectRaw('YEAR(date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('financial_report', compact('months', 'years', 'year'));
    }
}