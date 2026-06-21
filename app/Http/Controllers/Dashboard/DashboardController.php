<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(
        private readonly DashboardService $service
    ) {
    }

    public function index(): View
    {
        $stats = $this->service->statistics();

        return view('dashboard.index', $stats);
    }
}
