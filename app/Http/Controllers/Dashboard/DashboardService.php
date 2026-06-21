<?php

namespace App\Http\Controllers\Dashboard;

/**
 * Service layer for the Dashboard module.
 */
class DashboardService
{
    public function __construct(
        private readonly DashboardRepository $repository
    ) {
    }

    /**
     * Task 7 — aggregate all dashboard statistics.
     *
     * @return array{
     *     totalCategories: int,
     *     totalProducts: int,
     *     totalStock: int,
     *     latestProducts: \Illuminate\Database\Eloquent\Collection
     * }
     */
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
