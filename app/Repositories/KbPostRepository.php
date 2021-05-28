<?php

namespace App\Repositories;

use App\Models\KbPost;

class KbPostRepository
{
    use BaseRepository;

    /**
     * KbPost Model
     *
     * @var KbPost
     */
    protected $model;

    /**
     * Constructor
     *
     * @param KbPost $KbPost
     */
    public function __construct(KbPost $KbPost)
    {
        $this->model = $KbPost;
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
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}