<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

/**
 * Repository layer for the Category module.
 */
class CategoryRepository
{
    /**
     * All categories (used to populate the product create form select).
     */
    public function all(): Collection
    {
        return Category::orderBy('name')->get();
    }

    /**
     * Task 6 — every category together with its products.
     *
     * Uses eager loading (with('products')) so all products are fetched
     * in a single extra query instead of one query per category (avoids
     * the N+1 problem). withCount adds a products_count attribute.
     */
    public function allWithProducts(): Collection
    {
        return Category::with('products')
            ->withCount('products')
            ->orderBy('name')
            ->get();
    }
}
