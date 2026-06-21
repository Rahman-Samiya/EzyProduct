<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Category\CategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $service,
        private readonly CategoryRepository $categoryRepository,
    ) {
    }

    public function index(Request $request): View
    {
        $data = $this->service->list(
            $request->query('search'),
            $request->query('sort'),
        );

        return view('products.index', $data);
    }

    public function show(int $id): View
    {
        $product = $this->service->find($id);

        return view('products.show', compact('product'));
    }

    public function jsonResponseIndex(Request $request): JsonResponse
    {
        $data = $this->service->list(
            $request->query('search'),
            $request->query('sort'),
        );

        return response()->json([
            'success' => true,
            'total'   => $data['total'],
            'data'    => $data['products'],
        ]);
    }

    public function jsonResponseShow(int $id): JsonResponse
    {
        $product = $this->service->find($id);

        return response()->json([
            'success' => true,
            'data'    => $product,
        ]);
    }

    public function create(): View
    {
        $categories = $this->categoryRepository->all();

        return view('products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = $this->service->store($request->validated());

        return redirect()
            ->route('products.confirmation', $product->id)
            ->with('success', "Product \"{$product->name}\" was created successfully!");
    }

    public function confirmation(int $id): View
    {
        $product = $this->service->find($id);

        return view('products.confirmation', compact('product'));
    }
}
