<?php

namespace App\Repositories;

use App\Models\TriggerType;

class TriggerTypeRepository
{
    use BaseRepository;

    /**
     * TriggerType Model
     *
     * @var TriggerType
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TriggerType $triggerType
     */
    public function __construct(TriggerType $triggerType)
    {
        $this->model = $triggerType;
    }

    /**
     * Get all the records
     *
     * @return array User
     */
    public function all()
    {
        return $this->model->orderBy('name', 'asc')->get();
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
                          ->orWhere('description', 'like', "%{$keyword}%")
                          ->orWhere('category', 'like', "%{$keyword}%")
                          ->orWhere('event', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}