<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SalesDashboardController extends Controller
{
    public function index(){
        // Today Sales
        $todaySalesTotal = DB::table('sales')
                        ->whereDate('created_at', Carbon::today())
                        ->sum('total_price');
        // Yesterday Sales
        $yesterdaySalesTotal = DB::table('sales')
                        ->whereDate('created_at', Carbon::yesterday())
                        ->sum('total_price');

        // This Month Sales
        $thisMonthSalesTotal = DB::table('sales')
                        ->whereMonth('created_at', Carbon::now()->month)
                        ->sum('total_price');

        // Last Month Sales
        $lastMonth = Carbon::now()->subMonth();
        $lastMonthNumber = $lastMonth->month;

        $lastMonthSalesTotal = DB::table('sales')
                        ->whereMonth('created_at', $lastMonthNumber)
                        ->sum('total_price');

        return view ("dashboard", compact('todaySalesTotal', 'yesterdaySalesTotal', 'thisMonthSalesTotal', 'lastMonthSalesTotal'));
    }
}
