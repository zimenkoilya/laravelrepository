<?php

namespace App\Repositories;

use App\Models\EventType;

class EventTypeRepository
{
    use BaseRepository;

    /**
     * EventType Model
     *
     * @var EventType
     */
    protected $model;

    /**
     * Constructor
     *
     * @param EventType $EventType
     */
    public function __construct(EventType $EventType)
    {
        $this->model = $EventType;
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
                    $query->where('name', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
    public function findByCompanyOwnerAndShared($company_id){

        $result = $this->model->select('event_types.*')
            ->leftJoin('event_types_co', 'event_types_co.event_type_id', 'event_types.id')
            ->where('event_types_co.company_id', $company_id) // Shared
            ->orWhere('event_types.company_id', $company_id) // Owned
            ->get();

        return $result;
    }
    
}