<?php

namespace App\Repositories;

use App\Models\UserProfile;

class UserProfileRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var UserProfile
     */
    protected $model;

    /**
     * Constructor
     *
     * @param UserProfile $UserProfile
     */
    public function __construct(UserProfile $UserProfile)
    {
        $this->model = $UserProfile;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'id')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('nickname', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}