<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ItemService;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $itemService;
    public function __construct(CategoryService $categoryService, ItemService $itemService) {
        $this->categoryService = $categoryService;
        $this->itemService = $itemService;
    }

    public function show($parent, $id) {
        $items = $this->itemService-> fetchItemByCategoryId($id);
        $target_cat = count($items) === 0 
                        ? $this->categoryService->fetchParentCatById($id)
                        : $items[0]->category;
        return view('category.show', compact('items', 'target_cat'));
    }

    public function getFieldchildren($parent) {
        return $this->categoryService->fetchParentCatsByParentId($parent);
    }
}
