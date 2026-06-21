<?php

namespace App\Http\Controllers\Category;

use Illuminate\Database\Eloquent\Collection;

/**
 * Service layer for the Category module.
 */
class CategoryService
{
    public function __construct(
        private readonly CategoryRepository $repository
    ) {
    }

    /**
     * Task 6 — categories with their related products (eager loaded).
     */
    public function listWithProducts(): Collection
    {
        return $this->repository->allWithProducts();
    }
}
