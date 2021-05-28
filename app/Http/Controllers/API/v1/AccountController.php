<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\API\v1\BaseController;
use Illuminate\Http\Request;

use App\Repositories\UserRepository;

class AccountController extends BaseController
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    public function profile(Request $request)
    {
        return $this->response->item($request->user());
    }
}
