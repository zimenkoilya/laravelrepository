<?php

namespace App\Repositories;

use App\Models\Campaign;

class CampaignRepository
{
    use BaseRepository;

    /**
     * Campaign Model
     *
     * @var Campaign
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Campaign $campaign
     */
    public function __construct(Campaign $campaign)
    {
        $this->model = $campaign;
    }

    /**
     * Get the list of all the campaign without myself.
     *
     * @return mixed
     */
    public function getList()
    {
        return $this->model
                    ->orderBy('id', 'desc')
                    ->get();
    }

    /**
     * Get the campaign by name.
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
    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%")
                          ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->where('active', 1)
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}