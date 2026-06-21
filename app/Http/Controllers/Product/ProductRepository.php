<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function filter(?string $search = null, ?string $sort = null): Collection
    {
        $query = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name');

        if (! empty($search)) {
            $query->where('products.name', 'like', '%' . $search . '%');
        }

        if (in_array($sort, ['asc', 'desc'], true)) {
            $query->orderBy('products.price', $sort);
        } else {
            $query->orderByDesc('products.id');
        }

        return $query->get();
    }

    public function totalCount(): int
    {
        return DB::table('products')->count();
    }

    public function findWithCategory(int $id): Product
    {
        return Product::with('category')->findOrFail($id);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }
}
