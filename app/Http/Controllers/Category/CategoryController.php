<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $service
    ) {
    }

    public function index(): View
    {
        $categories = $this->service->listWithProducts();

        return view('categories.index', compact('categories'));
    }
}
