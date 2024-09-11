<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    // List categories with pagination and search
    public function index(Request $request)
    {
        $categories = $this->categoryService->getAllCategories($request);
        return view('categories.index', compact('categories'));
    }

    // Show form to create a new category
    public function create()
    {
        return view('categories.create');
    }

    // Store a new category
    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->createCategory($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    // Show form to edit an existing category
    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);

        if (!$category) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'Category not found.');
        }

        return view('categories.edit', compact('category'));
    }

    // Update an existing category
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->categoryService->updateCategory(
            $id,
            $request->validated()
        );

        if (!$category) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'Category not found.');
        }

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
