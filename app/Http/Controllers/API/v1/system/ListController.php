<?php
namespace App\Http\Controllers\API\v1\system;

use App\Http\Controllers\API\v1\BaseController as Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ListRequest;
use App\Repositories\ListRepository;
use App\Transformers\ListTransformer;

use Auth;

class ListController extends Controller
{
    protected $list;

    public function __construct(ListRepository $list)
    {
        parent::__construct();

        $this->list = $list;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->response->collection($this->list->getByType($request->type), new ListTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ListsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListRequest $request)
    {
        $user = auth()->user();

        $data = array_merge($request->all(), [
            'created_by' => $user->id,
            'company_id' => $user->company_id
        ]);

        $list = $this->list->store($data);

        return $this->response->item($list, new ListTransformer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = $this->list->getById($id);

        return $this->response->item($list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array_merge($request->all(), [
            'updated_by' => Auth::id()
        ]);
        $list = $this->list->update($id, $data);

        return $this->response->withNoContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->list->destroy($id);

        return $this->response->withNoContent();
    }

}
