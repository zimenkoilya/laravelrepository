<?php

namespace Modules\Task\Repositories;

use App\Repositories\BaseRepository;
use Modules\Task\Models\Task;

class TaskRepository
{
    use BaseRepository;

    /**
     * Task Model
     *
     * @var Task
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function query($request) {
        $company_id = auth()->user()->company_id;
        $query = $this->model->where('company_id', $company_id);

        if ($request->status != 'any') {
            $query = $query->where('status', $request->status);
        }
        if (isset($request->due_date_from)) {
            $query = $query->whereDate('due_date', '>=', $request->due_date_from);
        }
        if (isset($request->due_date_to)) {
            $query = $query->whereDate('due_date', '<=', $request->due_date_to);
        }
        if (isset($request->assigned_at_from)) {
            $query = $query->whereDate('assigned_at', '>=', $request->assigned_at_from);
        }
        if (isset($request->assigned_at_to)) {
            $query = $query->whereDate('assigned_at', '<=', $request->assigned_at_to);
        }
        if (isset($request->completed_at_from)) {
            $query = $query->whereDate('completed_at', '>=', $request->completed_at_from);
        }
        if (isset($request->completed_at_to)) {
            $query = $query->whereDate('completed_at', '<=', $request->completed_at_to);
        }

        return $query;
    }

    public function paginate($request)
    {
        return $this->query($request)->paginate($request->per_page);
    }

    public function countByStatus($request, $status)
    {
        if ($request->status != 'any' && $request->status != $status) {
            return 0;
        }

        $query = $this->query($request);
        return $query->where('status', $status)->count();
    }

    public function store($data)
    {
        $data['company_id'] = auth()->user()->company_id;
        $data['assigned_at'] = now();
        $data['created_at'] = now();
        $data['created_by'] = auth()->user()->id;
        $data['status'] = 'pending';

        return $this->model->create($data);
    }

}