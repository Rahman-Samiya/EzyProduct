<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Repository layer for the Dashboard module.
 *
 * Task 7 — all statistics are fetched from the database using the
 * Query Builder / Eloquent ORM.
 */
class DashboardRepository
{
    public function totalCategories(): int
    {
        return DB::table('categories')->count();
    }

    public function totalProducts(): int
    {
        return DB::table('products')->count();
    }

    public function totalStock(): int
    {
        return (int) DB::table('products')->sum('stock');
    }

    /**
     * Latest 5 products (Eloquent, with category eager loaded).
     */
    public function latestProducts(int $limit = 5): Collection
    {
        return Product::with('category')
            ->latest()
            ->take($limit)
            ->get();
    }
}
