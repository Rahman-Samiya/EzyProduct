<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public function all(): Collection
    {
        return Category::orderBy('name')->get();
    }

    public function allWithProducts(): Collection
    {
        return Category::with('products')
            ->withCount('products')
            ->orderBy('name')
            ->get();
    }
}
