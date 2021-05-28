<?php

namespace App\Http\Controllers\API\v1\system;

use App\Http\Controllers\API\v1\BaseController as Controller;
use Illuminate\Http\Request;

use App\Http\Requests\DepartmentRequest;
use App\Repositories\DepartmentRepository;

class DepartmentController extends Controller
{
    protected $department;

    public function __construct(DepartmentRepository $department)
    {
        parent::__construct();

        $this->department = $department;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->response->collection($this->department->pageWithRequest($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $data = array_merge($request->all(), [
            'company_id' => $request->user()->company_id,
            'created_by' => $request->user()->id
        ]);

        $department = $this->department->store($data);

        return $this->response->withNoContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = $this->department->getById($id);

        return $this->response->item($department);
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
        $data = array_merge($request->all(), [
            'company_id' => $request->user()->company_id,
            'updated_by' => $request->user()->id
        ]);
        $this->department->update($id, $data);

        return $this->response->withNoContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->department->destroy($id);

        return $this->response->withNoContent();
    }
}
