<?php

namespace App\Repositories;

use App\Models\AccountingType;

class AccountingTypeRepository
{
    use BaseRepository;

    /**
     * AccountingType Model
     *
     * @var AccountingType
     */
    protected $model;

    /**
     * Constructor
     *
     * @param AccountingType $accountingType
     */
    public function __construct(AccountingType $accountingType)
    {
        $this->model = $accountingType;
    }

    /**
     * Get the accountingType by name.
     *
     * @param  string $name
     * @return mixed
     */
    public function getByName($name)
    {
        return $this->model
                    ->where('name', $name)
                    ->first();
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'name')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%")
                          ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }

    public function findAllByCompany($company_id){
        $result = $this->model->where('company_id', $company_id)
            ->get();
        return $result;
    }

    public function add($data){
        $result = $this->model->create($data);
        return $result;
    }

    public function update($id, $data){
        $result = $this->model->find($id)->fill($data);
        $result->update();
    }

    public function delete($id){
        $result = $this->model->find($id)->delete();
    }
    
}