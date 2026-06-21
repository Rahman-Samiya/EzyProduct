<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Dashboard module controller (Task 7).
 *
 * Flow: route -> controller -> service -> repository.
 */
class DashboardController extends Controller
{
    public function __construct(
        private readonly DashboardService $service
    ) {
    }

    /**
     * Display the dashboard with statistics fetched from the database.
     */
    public function index(): View
    {
        $stats = $this->service->statistics();

        return view('dashboard.index', $stats);
    }
}
