<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

/**
 * Service layer for the Product module.
 *
 * Holds the business logic and sits between the controller and the
 * repository. The controller never touches the repository directly.
 */
class ProductService
{
    public function __construct(
        private readonly ProductRepository $repository
    ) {
    }

    /**
     * Build the data needed for the product list screen (Task 5).
     *
     * @return array{products: \Illuminate\Support\Collection, total: int, search: ?string, sort: ?string}
     */
    public function list(?string $search = null, ?string $sort = null): array
    {
        return [
            'products' => $this->repository->filter($search, $sort),
            'total'    => $this->repository->totalCount(),
            'search'   => $search,
            'sort'     => $sort,
        ];
    }

    /**
     * Get a single product with its category for the details page.
     */
    public function find(int $id): Product
    {
        return $this->repository->findWithCategory($id);
    }

    /**
     * Store a product and write the submitted data to the log file (Task 4).
     */
    public function store(array $data): Product
    {
        // store data in database
        $product = $this->repository->create($data);

        // Task 4 — write submitted data into the Laravel log file.
        
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
