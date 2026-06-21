<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductService
{
    public function __construct(
        private readonly ProductRepository $repository
    ) {
    }

    public function list(?string $search = null, ?string $sort = null): array
    {
        return [
            'products' => $this->repository->filter($search, $sort),
            'total'    => $this->repository->totalCount(),
            'search'   => $search,
            'sort'     => $sort,
        ];
    }

    public function find(int $id): Product
    {
        return $this->repository->findWithCategory($id);
    }

    public function store(array $data): Product
    {
        $product = $this->repository->create($data);

        Log::info('New product created via create form.', [
            'id'          => $product->id,
            'name'        => $product->name,
            'category_id' => $product->category_id,
            'price'       => $product->price,
            'stock'       => $product->stock,
        ]);

        return $product;
    }
}
