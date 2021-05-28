<?php

namespace App\Http\Controllers\API\v1\system;

use App\Http\Controllers\API\v1\BaseController as Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Repositories\UserRepository;

use App\Events\UserCreated;

use Carbon\Carbon;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    /**
     * Display all of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        return $this->response->collection($this->user->all($request));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->response->collection($this->user->pageWithRequest($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = array_merge($request->all(), [
            'company_id' => $request->user()->company_id,
            'password' => bcrypt($request->input('password'))
        ]);

        $user = $this->user->store($data);
        $user->email_verified_at = now();
        $user->save();

        // $role = $request->input('role');
        // if (isset($role) && $role == 'admin') {
        //     $user->assignRole('admin');
        // }
        // else {
        //     $user->assignRole('editor');
        // }
        // event(new UserCreated($user, $request->input('pasword')));

        return $this->response->withNoContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->response->item($this->user->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['first_name', 'last_name']);
        $user = $this->user->update($id, $data);
        
        return $this->response->withNoContent();
    }

    public function setRole(Request $request, $id) 
    {
        $user = $this->user->getById($id);
        if (isset($user)) {
            $role = $request->input('role');

            if (isset($role)) {

            }
        }
    }

    /**
     * Update user password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request, $id)
    {
        $user = $this->user->getById($id);

        $this->user->changePassword($user, $request->input('new_password'));

        return $this->response->withNoContent();
    }
}
