<?php

namespace App\Repositories;

use App\Models\CaseTransfer;

class CaseTransferRepository
{
    use BaseRepository;

    /**
     * CaseTransfer Model
     *
     * @var CaseTransfer
     */
    protected $model;

    /**
     * Constructor
     *
     * @param CaseTransfer $CaseTransfer
     */
    public function __construct(CaseTransfer $CaseTransfer)
    {
        $this->model = $CaseTransfer;
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