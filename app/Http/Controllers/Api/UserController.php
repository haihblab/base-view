<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\Api\UserServiceInterface;
use App\Http\Requests\Api\Users\IndexRequest;

class UserController extends ApiController
{
    protected $userService;
    /**
     * UserController constructor.
     */
    public function __construct(UserServiceInterface $serviceService)
    {
        parent::__construct();
        $this->userService = $serviceService;
    }

    /**
     * @param IndexRequest $request
     * @param UserServiceInterface $serviceService
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\CheckAuthenticationException
     * @throws \App\Exceptions\CheckAuthorizationException
     * @throws \App\Exceptions\NotFoundException
     * @throws \App\Exceptions\QueryException
     * @throws \App\Exceptions\ServerException
     * @throws \App\Exceptions\UnprocessableEntityException
     */
    public function index(IndexRequest $request)
    {
        $params = $request->all();
        return $this->getData(function () use ($params) {
            return $this->userService->index($params);
        });
    }
}
