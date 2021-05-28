<?php

namespace App\Repositories;

use App\Models\ActionGroup;

class ActionGroupRepository
{
    use BaseRepository;

    /**
     * ActionGroup Model
     *
     * @var ActionGroup
     */
    protected $model;

    /**
     * Constructor
     *
     * @param ActionGroup $actionGroup
     */
    public function __construct(ActionGroup $actionGroup)
    {
        $this->model = $actionGroup;
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