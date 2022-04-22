<?php

namespace App\Http\ViewComposers;

use App\Services\CategoryService;
use Illuminate\View\View;

class CategoryListComposer
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function compose(View $view) {
        $view->with([
            'parent_cat' => $this->categoryService->fetchParentCats(), 
        ]);
    }
}