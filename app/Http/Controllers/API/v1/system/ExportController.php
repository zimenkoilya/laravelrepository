<?php

namespace App\Http\Controllers\API\v1\system;

use App\Http\Controllers\API\v1\BaseController as Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ExportRequest;
use App\Repositories\ExportRepository;

use Auth;

class ExportController extends Controller
{
    protected $export;

    public function __construct(ExportRepository $export)
    {
        parent::__construct();

        $this->export = $export;
    }

    /**
     * Get all of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        return $this->response->collection($this->export->all());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->response->collection($this->export->pageWithRequest($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExportRequest $request)
    {
        $data = array_merge($request->all(), [
            'company_id' => $request->user()->company_id,
            'created_by' => $request->user()->id
        ]);

        $export = $this->export->store($data);

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
        $export = $this->export->getById($id);

        return $this->response->item($export);
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
        $data = array_merge($request->only(['name', 'type', 'data_template', 'url', 'active']), [
            'company_id' => $request->user()->company_id,
            'updated_by' => $request->user()->id
        ]);
        $this->export->update($id, $data);

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
        $this->export->destroy($id);

        return $this->response->withNoContent();
    }
}
