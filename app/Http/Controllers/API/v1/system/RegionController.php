<?php

namespace App\Http\Controllers\API\v1\system;

use App\Http\Controllers\API\v1\BaseController as Controller;
use Illuminate\Http\Request;

use App\Http\Requests\RegionRequest;
use App\Repositories\RegionRepository;
use App\Events\RegionCreated;

use Auth;
use Carbon\Carbon;

class RegionController extends Controller
{
    protected $region;

    public function __construct(RegionRepository $region)
    {
        parent::__construct();

        $this->region = $region;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->response->collection($this->region->pageWithRequest($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {
        $data = array_merge($request->all(), [
            'created_by' => Auth::id()
        ]);

        $region = $this->region->store($data);
        event(new RegionCreated($region));

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
        $region = $this->region->getById($id);

        return $this->response->item($region);
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
        $data = $request->all();
        $this->region->update($id, $data);

        return $this->response->withNoContent();
    }
}
