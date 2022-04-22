<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ItemService;

class ParentCatController extends Controller
{
    protected $categoryService;
    protected $itemService;
    public function __construct(CategoryService $categoryService, ItemService $itemService) {
        $this->categoryService = $categoryService;
        $this->itemService = $itemService;
    }

    public function index() {
        $categories = $this->categoryService->fetchCats()->groupBy('parent_id');
        return view('category.list', compact('categories'));
    }

    public function show($id) {
        $items = $this->itemService->fetchItemByParentCategoryId($id);
        $target_cat = count($items) === 0 
                        ? $this->categoryService->fetchParentCatById($id)->parent_cat
                        : $items[0]->category->parent_cat;

        return view('category.show', compact('items', 'target_cat'));
    }
}
