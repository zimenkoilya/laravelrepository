<?php

namespace App\Http\Controllers\API\v1\system;

use App\Http\Controllers\API\v1\BaseController as Controller;
use Illuminate\Http\Request;

use App\Repositories\PaymentScheduleTypeRepository;
use App\Requests\PaymentScheduleTypeRequest;

class PaymentScheduleTypeController extends Controller
{
    protected $paymentScheduleType;

    public function __construct(PaymentScheduleTypeRepository $paymentScheduleType)
    {
        parent::__construct();

        $this->paymentScheduleType = $paymentScheduleType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        return $this->response->collection($this->paymentScheduleType->all($request));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->response->collection($this->paymentScheduleType->pageWithRequest($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentScheduleTypeRequest $request)
    {
        $data = $request->all();

        $paymentScheduleType = $this->paymentScheduleType->store($data);

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
        $paymentScheduleType = $this->paymentScheduleType->getById($id);

        return $this->response->item($paymentScheduleType);
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
        $this->paymentScheduleType->update($id, $data);

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
        $this->paymentScheduleType->destroy($id);

        return $this->response->withNoContent();
    }
}
