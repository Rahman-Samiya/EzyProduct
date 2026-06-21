<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Repository layer for the Product module.
 *
 * All database access for products lives here so the service layer
 * never talks to the database directly. Task 5 (Query Builder) is
 * implemented in this class.
 */
class ProductRepository
{
    /**
     * Task 5 — fetch products using the Query Builder with optional
     * name search and price sorting (ascending / descending).
     */
    public function filter(?string $search = null, ?string $sort = null): Collection
    {
        $query = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name');

        // Search products by name
        if (! empty($search)) {
            $query->where('products.name', 'like', '%' . $search . '%');
        }

        // Sort products by price (asc / desc), newest first by default
        if (in_array($sort, ['asc', 'desc'], true)) {
            $query->orderBy('products.price', $sort);
        } else {
            $query->orderByDesc('products.id');
        }

        return $query->get();
    }

    /**
     * Task 5 — total number of products (Query Builder count()).
     */
    public function totalCount(): int
    {
        return DB::table('products')->count();
    }

    /**
     * Eloquent fetch of a single product together with its category
     * (eager loaded) for the details page.
     */
    public function findWithCategory(int $id): Product
    {
        return Product::with('category')->findOrFail($id);
    }

    /**
     * Persist a new product (Eloquent mass assignment).
     */
    public function create(array $data): Product
    {
        return Product::create($data);
    }
}
