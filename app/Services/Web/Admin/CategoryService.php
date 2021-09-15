<?php

namespace App\Services\Web\Admin;

use App\Contracts\Services\Web\Admin\CategoryServiceInterface;
use App\Services\AbstractService;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use Illuminate\Support\Str;

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

    public function create()
    {
        $categories = $this->categoryRepository->getColumns(['*'])->get();

        return [
            'categories' => $categories
        ];
    }

    public function store($params, $request)
    {
        $params['c_slug'] = Str::slug($params['c_name']);
        if ($request->c_avatar) {
            $image = upload_image('c_avatar');
            if ($image['code'] == 1) {
                $params['c_avatar'] = $image['name'];
            }
        }

        return $this->categoryRepository->store($params);
    }
}
