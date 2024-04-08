<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogArticle;
use App\Models\FileEntry;
use App\Models\FileReport;
use App\Models\Page;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::orderbyDesc('id')->limit(6)->get();
        $totalUsers = User::all()->count();
        $totalPages = Page::all()->count();
        $totalArticles = BlogArticle::all()->count();
        $totalUploads = FileEntry::notExpired()->count();
        $totalReportedFiles = FileReport::fileEntryActive()->count();
        $totalUsersUploads = FileEntry::userEntry()->notExpired()->count();
        $totalGuestsUploads = FileEntry::guestEntry()->notExpired()->count();
        $totalUsedSpace = FileEntry::notExpired()->sum('size');
        return view('backend.dashboard.index', [
            'users' => $users,
            'totalUsers' => formatNumber($totalUsers),
            'totalPages' => formatNumber($totalPages),
            'totalArticles' => formatNumber($totalArticles),
            'totalUploads' => formatNumber($totalUploads),
            'totalUsersUploads' => formatNumber($totalUsersUploads),
            'totalGuestsUploads' => formatNumber($totalGuestsUploads),
            'totalUsedSpace' => formatBytes($totalUsedSpace),
        ]);
    }

    public function usersChartData()
    {
        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();
        $dates = chartDates($startDate, $endDate);
        $usersRecord = User::where('created_at', '>=', Carbon::now()->startOfWeek())
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date');
        $usersRecordData = $dates->merge($usersRecord);
        $usersChartLabels = [];
        $usersChartData = [];
        foreach ($usersRecordData as $key => $value) {
            $usersChartLabels[] = Carbon::parse($key)->format('d F');
            $usersChartData[] = $value;
        }
        $suggestedMax = (max($usersChartData) > 9) ? max($usersChartData) + 2 : 10;
        return ['usersChartLabels' => $usersChartLabels, 'usersChartData' => $usersChartData, 'suggestedMax' => $suggestedMax];
    }

    public function uploadsChartData()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        $dates = chartDates($startDate, $endDate);
        $monthlyUploads = FileEntry::where('created_at', '>=', Carbon::now()->startOfMonth())
            ->notExpired()
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date');
        $monthlyUploadsData = $dates->merge($monthlyUploads);
        $uploadsChartLabels = [];
        $uploadsChartData = [];
        foreach ($monthlyUploadsData as $key => $value) {
            $uploadsChartLabels[] = Carbon::parse($key)->format('d F');
            $uploadsChartData[] = $value;
        }
        $suggestedMax = (max($uploadsChartData) > 9) ? max($uploadsChartData) + 2 : 10;
        return ['uploadsChartLabels' => $uploadsChartLabels, 'uploadsChartData' => $uploadsChartData, 'suggestedMax' => $suggestedMax];
    }
}
