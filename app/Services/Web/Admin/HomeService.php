<?php

namespace App\Services\Web\Admin;

use App\Contracts\Services\Web\Admin\HomeServiceInterface;
use App\Services\AbstractService;

class HomeService extends AbstractService implements HomeServiceInterface
{
    /**
     * @var 
     */


    /**
     * HomeService constructor.
     * 
     */
    public function __construct()
    {

    }

    /**
     * 
     * @return array
     */
    public function index()
    {
        return [
            'totalTransactions' => 0,
            'totalUsers' => 0,
            'totalProducts' => 0,
        ];
    }
}
