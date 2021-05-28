<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    use BaseRepository;

    /**
     * Company Model
     *
     * @var Company
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->model = $company;
    }

    /**
     * Get the list of all the company without myself.
     *
     * @return mixed
     */
    public function getCalendarOption()
    {
        return $this->model
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * Get number of the records
     *
     * @param  Request $request
     * @param  int $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return Paginate
     */
    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                                $query->where('name', 'like', "%{$keyword}%")
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
                            })
                            ->where('active', 1)
                            ->orderBy($sortColumn, $sort)
                            ->paginate($number);
    }
}