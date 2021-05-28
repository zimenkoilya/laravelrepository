<?php

namespace App\Repositories;

use App\Models\UserSetting;

class UserSettingRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var UserSetting
     */
    protected $model;

    /**
     * Constructor
     *
     * @param UserSetting $UserSetting
     */
    public function __construct(UserSetting $UserSetting)
    {
        $this->model = $UserSetting;
    }

    public function getByName($name){
        return $this->model->where('name', $name)->first();
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'created')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', "%{$keyword}%")
            ->orWhere('type', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}