<?php

namespace App\Repositories;

use App\Models\Announcement;

class AnnouncementRepository
{
    use BaseRepository;

    /**
     * Announcement Model
     *
     * @var Announcement
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Announcement $announcement
     */
    public function __construct(Announcement $announcement)
    {
        $this->model = $announcement;
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
                    $query->where('message', 'like', "%{$keyword}%")
                          ->orWhere('type', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}