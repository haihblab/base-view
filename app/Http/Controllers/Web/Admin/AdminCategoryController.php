<?php

namespace App\Http\Controllers\Web\Admin;

use App\Contracts\Services\Web\Admin\CategoryServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebController;
use App\Http\Requests\Web\Category\AdminCategoryRequest;

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
            $data = $this->categoryService->create();
            return view('admin.category.create', $data);
        });
    }

    public function store(AdminCategoryRequest $request)
    {
        $params = $request->only('c_name', 'c_parent_id');
        return $this->doRequest(function () use ($params, $request) {
            $data = $this->categoryService->store($params, $request);
            if ($data) {
                $request->session()->flash('toastr', [
                    'type'      => 'success',
                    'message'   => 'Success !'
                ]);
                return redirect()->back();
            }
        });
    }
}
