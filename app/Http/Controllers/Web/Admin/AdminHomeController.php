<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebController;
use App\Contracts\Services\Web\Admin\HomeServiceInterface;

class AdminHomeController extends WebController
{
    protected $homeService;
    /**
     * UserController constructor.
     */
    public function __construct(HomeServiceInterface $homeService)
    {
        parent::__construct();
        $this->homeService = $homeService;
    }

    public function index()
    {
        return $this->getData(function() {
            $data = $this->homeService->index();
            return view('admin.index', $data);
        });
    }
}
