<?php

namespace App\Repositories;

use App\Models\Webhook;

class WebhookRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var Webhook
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Webhook $Webhook
     */
    public function __construct(Webhook $Webhook)
    {
        $this->model = $Webhook;
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
        return $this->model
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}