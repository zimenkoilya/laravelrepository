<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Models\Task;
use Modules\Task\Repositories\TaskRepository;
use Modules\Task\Repositories\TaskTemplateRepository;

class TaskController extends Controller
{
    private $taskRepository;
    private $templateRepository;

    public function __construct(
        TaskRepository $taskRepository,
        TaskTemplateRepository $templateRepository
    )
    {
        $this->taskRepository = $taskRepository;
        $this->templateRepository = $templateRepository;
    }

    public function create(Request $request)
    {
        return response()->json($this->taskRepository->store($request->all()));
    }

    public function read(Request $request)
    {
        return response()->json($this->taskRepository->getById($request->id));
    }

    public function update(Request $request)
    {
        return response()->json($this->taskRepository->update($request->id, $request->all()));
    }

    public function delete(Request $request)
    {
        return response()->json($this->taskRepository->destroy($request->id));
    }

    public function list(Request $request)
    {
        return response()->json([
            'tasks' => $this->taskRepository->paginate($request)->items(),
            'count' => [
                'pending' => $this->taskRepository->countByStatus($request, 'pending'),
                'complete' => $this->taskRepository->countByStatus($request, 'complete'),
                'overdue' => $this->taskRepository->countByStatus($request, 'overdue'),
            ]
        ]);
    }

    public function templates()
    {
        return response()->json($this->templateRepository->list());
    }

    public function complete(Request $request)
    {
        $task = $this->taskRepository->getById($request->id)->toArray();
        $task['completed_at'] = now();
        $task['completed_by'] = auth()->user()->id;
        $task['status'] = 'complete';

        $this->taskRepository->update($request->id, $task);
        return response()->json($this->taskRepository->getById($request->id));
    }
}
