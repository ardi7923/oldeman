<?php

namespace App\Http\Controllers\Admin;
        
use Illuminate\Http\Request;
use CrudAjax;
use App\Http\Requests\RainfallRequest;
use App\Models\Rainfall;
use DataTables;
use App\Services\RainfallService;

class RainfallController extends CrudAjax
{
    protected $model  = Rainfall::class;
    protected $url    = "admin/rainfall/";
    protected $folder = "pages.admin.rainfall.";
    
    private $facade;

    public function __construct(RainfallService $facade)
    {
        parent::__construct();
        $this->facade = $facade;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->datatable();
        }

        return view($this->folder."index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return renderToJson($this->folder."create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RainfallRequest $request)
    {
        return $this->setFacade($this->facade)->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->findOrFail($id);
        return renderToJson($this->folder."edit",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RainfallRequest $request, $id)
    {
        return $this->setParams($id)->setFacade($this->facade)->change();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->setParams($id)->delete();
    }
    /**
     * json data for datatable.
     *
     * 
     * @return DataTables
     */
    public function datatable()
    {
        $data = $this->model->query();
        
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function ($data) {
            return view('components.datatables.action', [
                'data'        => $data,
                'size'        => "lg",
                'url_edit'    => url($this->url . $data->id . '/edit'),
                'url_destroy' => url($this->url . $data->id),
                'delete_text' => view($this->folder . 'delete', compact('data'))->render()
            ]);
        })
        ->make(true); 
    }
    
}