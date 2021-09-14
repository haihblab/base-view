<?php

namespace App\Http\Controllers\Web\Admin;

use App\Contracts\Services\Web\Admin\CategoryServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebController;

class AdminCategoryController extends WebController
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return $this->getData(function () {
            $data = $this->categoryService->index();
            return view('admin.category.index', $data);
        });
    }

    public function create()
    {
        return $this->getData(function () {
            $data = [];
            return view('admin.category.create', $data);
        });
    }
}
