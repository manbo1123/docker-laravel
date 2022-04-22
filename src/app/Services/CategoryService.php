<?php

namespace App\Services;

use App\Models\Category;
use App\Models\ParentCat;

class CategoryService {
    private $category;
    private $parentCat;
    public function __construct(Category $category, ParentCat $parentCat) {
        $this->category = $category;
        $this->parentCat = $parentCat;
    }

    // 親カテゴリーをすべて取得
    public function fetchParentCats() {
        return $this->parentCat->select('id', 'name', 'icon')->get();
    }

    // 子カテゴリーをすべて取得
    public function fetchCats() {
        return $this->category->select('id', 'name', 'parent_id', )
                              ->with('parent_cat:id,name,icon')
                              ->get();
    }

    // idから子カテゴリーを1つ取得
    public function fetchParentCatById($categoryId) {
        return $this->category->where('id', $categoryId)
                              ->select('id', 'name', 'parent_id')
                              ->with('parent_cat:id,name,icon')
                              ->first();
    }

    // parent_idから子カテゴリーをすべて取得
    public function fetchParentCatsByParentId($parentId) {
        return $this->category->where('parent_id', $parentId)
                              ->select('id', 'name')
                              ->get();
    }
}
