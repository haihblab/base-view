<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * categoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
}
