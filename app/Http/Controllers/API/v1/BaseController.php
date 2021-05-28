<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Support\Response;
use App\Support\Transform;
use League\Fractal\Manager;

class BaseController extends Controller
{
    protected $response;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        $manager = new Manager();

        $this->response = new Response(response(), new Transform($manager));
    }
}
