<?php
namespace App\Http\Controllers\API\v1\system;

use App\Http\Controllers\API\v1\BaseController as Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use App\Transformers\CompanyTransformer;
use App\Events\CompanyCreated;

use Auth;
use Carbon\Carbon;

class CompanyController extends Controller
{
    protected $company;

    public function __construct(CompanyRepository $company)
    {
        parent::__construct();

        $this->company = $company;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_company = $request->user()->company;
        $network_company_ids = [$user_company->id];        
        $user_networks = $user_company->networks;
        foreach ($user_networks as $network) {
            if (isset($network->companies)) {
                foreach($network->companies as $company) {
                    $network_company_ids[] = $company->id;
                }
            }
        }        
        
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $limit = $request->get('limit');
        }
        else {
            $limit = 10;
        }

        $sortColumn = 'created_at';
        $sort = 'desc';
        if ($request->has('sort')) {
            $sortColumn = $request->get('sort');
        }

        $companies = Company::whereIn('id', $network_company_ids)
                            ->where('active', 1)
                            ->when($keyword, function ($query) use ($keyword) {
                                $query->where(function($query1) use ($keyword) {
                                    $query1->where('name', 'like', "%{$keyword}%")
                                          ->orWhere('long_name', 'like', "%{$keyword}%")
                                          ->orWhere('email', 'like', "%{$keyword}%")
                                          ->orWhere('case_email_domain', 'like', "%{$keyword}%")
                                          ->orWhere('office_address', 'like', "%{$keyword}%")
                                          ->orWhere('office_address_2', 'like', "%{$keyword}%")
                                          ->orWhere('office_city', 'like', "%{$keyword}%")
                                          ->orWhere('office_state', 'like', "%{$keyword}%")
                                          ->orWhere('office_zip', 'like', "%{$keyword}%")
                                          ->orWhere('office_fax', 'like', "%{$keyword}%")
                                          ->orWhere('office_phone', 'like', "%{$keyword}%")
                                          ->orWhere('legal_name', 'like', "%{$keyword}%")
                                          ->orWhere('cs_email', 'like', "%{$keyword}%")
                                          ->orWhere('cs_phone', 'like', "%{$keyword}%")
                                          ->orWhere('website', 'like', "%{$keyword}%")
                                          ->orWhere('social_facebook', 'like', "%{$keyword}%")
                                          ->orWhere('social_instagram', 'like', "%{$keyword}%")
                                          ->orWhere('social_twitter', 'like', "%{$keyword}%")
                                          ->orWhere('social_googleplus', 'like', "%{$keyword}%")
                                          ->orWhere('social_linkedin', 'like', "%{$keyword}%");                                    
                                });
                            })
                            ->orderBy($sortColumn, $sort)
                            ->paginate($limit);
        
        return $this->response->collection($companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $data = array_merge($request->all(), [
            'created_by' => Auth::id()
        ]);

        $company = $this->company->store($data);
        event(new CompanyCreated($company));

        if ($request->has('accounting_types_ids')) {
            $accounting_types_ids = $request->input('accounting_types_ids');
            if (isset($accounting_types_ids) && count($accounting_types_ids) > 0) {
                $company->accounting_types()->sync($accounting_types_ids);
            }
        }

        if ($request->has('payment_schedule_types_ids')) {
            $payment_schedule_types_ids = $request->input('payment_schedule_types_ids');
            if (isset($payment_schedule_types_ids) && count($payment_schedule_types_ids) > 0) {
                $company->payment_schedule_types()->sync($payment_schedule_types_ids);
            }
        }

        if ($request->has('document_templates_ids')) {
            $document_templates_ids = $request->input('document_templates_ids');
            if (isset($document_templates_ids) && count($document_templates_ids) > 0) {
                $company->document_templates()->sync($document_templates_ids);
            }
        }

        if ($request->has('services_ids')) {
            $services_ids = $request->input('services_ids');
            if (isset($services_ids) && count($services_ids) > 0) {
                $company->services()->sync($services_ids);
            }
        }

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
        $company = $this->company->getById($id);

        return $this->response->item($company);
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
            'updated_by' => Auth::id()
        ]);
        $company = $this->company->update($id, $data);

        if ($request->has('accounting_types_ids')) {
            $accounting_types_ids = $request->input('accounting_types_ids');
            if (isset($accounting_types_ids) && count($accounting_types_ids) > 0) {
                $company->accounting_types()->sync($accounting_types_ids);
            }
        }

        if ($request->has('payment_schedule_types_ids')) {
            $payment_schedule_types_ids = $request->input('payment_schedule_types_ids');
            if (isset($payment_schedule_types_ids) && count($payment_schedule_types_ids) > 0) {
                $company->payment_schedule_types()->sync($payment_schedule_types_ids);
            }
        }

        if ($request->has('document_templates_ids')) {
            $document_templates_ids = $request->input('document_templates_ids');
            if (isset($document_templates_ids) && count($document_templates_ids) > 0) {
                $company->document_templates()->sync($document_templates_ids);
            }
        }

        if ($request->has('services_ids')) {
            $services_ids = $request->input('services_ids');
            if (isset($services_ids) && count($services_ids) > 0) {
                $company->services()->sync($services_ids);
            }
        }

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
        $this->company->destroy($id);

        return $this->response->withNoContent();
    }

    // public function schedule(Request $request) {
    //     $company = $request->user()->company();
    //     $company_schedule = $company->calendar_option;

    //     return $this->response->json(['schedule' => $company_schedule]);
    // }

    // public function update_schedule(Request $request) {
    //     $data = array_merge($request->all(), [
    //         'company_id' => $request->user()->company_id,
    //         'user_id' => $request->user()->id
    //     ]);

    //     $company = $request->user()->company();
    //     $company_schedule = $company->calendar_option;

    //     return $this->response->json(['schedule' => $company_schedule]);
    // }
}
