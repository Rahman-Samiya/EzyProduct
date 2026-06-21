<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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

    public function latestProducts(int $limit = 5): Collection
    {
        return Product::with('category')
            ->latest()
            ->take($limit)
            ->get();
    }
}
