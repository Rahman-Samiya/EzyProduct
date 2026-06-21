<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Category module controller.
 *
 * Flow: route -> controller -> service -> repository.
 */
class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $service
    ) {
    }

    /**
     * Task 6 — display each category with its products using the
     * Eloquent One-to-Many relationship (eager loaded).
     */
    public function index(): View
    {
        $categories = $this->service->listWithProducts();

        return view('categories.index', compact('categories'));
    }
}
