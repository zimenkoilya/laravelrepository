<?php

namespace App\Http\Controllers\API\v1\system;

use App\Http\Controllers\API\v1\BaseController as Controller;
use Illuminate\Http\Request;

use App\Http\Requests\DistributionGroupRequest;
use App\Repositories\DistributionGroupRepository;

use Auth;

class DistributionGroupController extends Controller
{
    protected $distribution_group;

    public function __construct(DistributionGroupRepository $distribution_group)
    {
        parent::__construct();

        $this->distribution_group = $distribution_group;
    }

    /**
     * Get all of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        return $this->response->collection($this->distribution_group->all());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->response->collection($this->distribution_group->pageWithRequest($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistributionGroupRequest $request)
    {
        $data = array_merge($request->all(), [
            'company_id' => $request->user()->company_id,
            'created_by' => $request->user()->id
        ]);

        $distribution_group = $this->distribution_group->store($data);

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
        $distribution_group = $this->distribution_group->getById($id);

        return $this->response->item($distribution_group);
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
        $this->distribution_group->update($id, $data);

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
        $this->distribution_group->destroy($id);

        return $this->response->withNoContent();
    }
}
