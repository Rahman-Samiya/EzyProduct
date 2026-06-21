<?php

namespace App\Http\Controllers\Dashboard;

class DashboardService
{
    public function __construct(
        private readonly DashboardRepository $repository
    ) {
    }

    public function statistics(): array
    {
        return [
            'totalCategories' => $this->repository->totalCategories(),
            'totalProducts'   => $this->repository->totalProducts(),
            'totalStock'      => $this->repository->totalStock(),
            'latestProducts'  => $this->repository->latestProducts(5),
        ];
    }
}
