<?php

namespace App\Contracts\Services\Web\Admin;

interface CategoryServiceInterface
{
    public function index();

    public function create();

    public function store($params, $request);
}
