<?php

namespace App\Services\Web\Admin;

use App\Contracts\Services\Web\Admin\CategoryServiceInterface;
use App\Services\AbstractService;
use App\Contracts\Repositories\CategoryRepositoryInterface;

class CategoryService extends AbstractService implements CategoryServiceInterface
{
    /**
     * @var $categoryRepository
     */
    protected $categoryRepository;

    /**
     * HomeService constructor.
     * 
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * 
     * @return array
     */
    public function index()
    {
        $categories = $this->categoryRepository->getColumns()->paginate();
        return [
            'categorys' => $categories,
        ];
    }
}
