<?php

namespace App\Http\Controllers\Category;

use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        private readonly CategoryRepository $repository
    ) {
    }

    public function listWithProducts(): Collection
    {
        return $this->repository->allWithProducts();
    }
}
