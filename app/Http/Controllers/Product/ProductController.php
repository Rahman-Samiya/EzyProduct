<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Category\CategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Product module controller.
 *
 * Demonstrates the three response types required by Task 1:
 *   - View response     (index, show, create, confirmation)
 *   - JSON response     (jsonResponseIndex, jsonResponseShow)
 *   - Redirect response (store)
 *
 * Flow: route -> controller -> service -> repository.
 */
class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $service,
        private readonly CategoryRepository $categoryRepository,
    ) {
    }

    /**
     * Task 1 + Task 5 — Product List (VIEW response).
     * Supports search by name and price sorting.
     */
    public function index(Request $request): View
    {
        $data = $this->service->list(
            $request->query('search'),
            $request->query('sort'),
        );

        return view('products.index', $data);
    }

    /**
     * Task 1 — Product Details (VIEW response).
     */
    public function show(int $id): View
    {
        $product = $this->service->find($id);

        return view('products.show', compact('product'));
    }

    /**
     * Task 1 — Product List as a JSON response.
     */
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

    /**
     * Task 1 — Product Details as a JSON response.
     */
    public function jsonResponseShow(int $id): JsonResponse
    {
        $product = $this->service->find($id);

        return response()->json([
            'success' => true,
            'data'    => $product,
        ]);
    }

    /**
     * Task 4 — show the Product Create form (VIEW response).
     */
    public function create(): View
    {
        $categories = $this->categoryRepository->all();

        return view('products.create', compact('categories'));
    }

    /**
     * Task 4 — store the product, flash a session message, write to the
     * log file and REDIRECT to the confirmation page.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = $this->service->store($request->validated());

        return redirect()
            ->route('products.confirmation', $product->id)
            ->with('success', "Product \"{$product->name}\" was created successfully!");
    }

    /**
     * Task 4 — confirmation page that displays the submitted product
     * information and the success message stored in the session.
     */
    public function confirmation(int $id): View
    {
        $product = $this->service->find($id);

        return view('products.confirmation', compact('product'));
    }
}
