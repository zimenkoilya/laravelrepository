<?php

namespace App\Http\Controllers\API\v1\system;

use App\Http\Controllers\API\v1\BaseController as Controller;
use Illuminate\Http\Request;

use App\Repositories\AccountingStatusRepository;
use App\Requests\AccountingStatusRequest;

class AccountingStatusController extends Controller
{
    protected $accountingStatus;

    public function __construct(AccountingStatusRepository $accountingStatus)
    {
        parent::__construct();

        $this->accountingStatus = $accountingStatus;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        return $this->response->collection($this->accountingStatus->all($request));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->response->collection($this->accountingStatus->pageWithRequest($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountingStatusRequest $request)
    {
        $data = $request->all();

        $accountingStatus = $this->accountingStatus->store($data);

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
        $accountingStatus = $this->accountingStatus->getById($id);

        return $this->response->item($accountingStatus);
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
        $this->accountingStatus->update($id, $data);

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
        $this->accountingStatus->destroy($id);

        return $this->response->withNoContent();
    }
}
