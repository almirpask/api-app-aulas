<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait ApiControllerTrait
{
    public function index(Request $request)
    {   
        $limit = empty($request->all()['limit']) ? 15 : $request->all()['limit'];

        $order = empty($request->all()['order']) ? null : $request->all()['order'];

        if($order != null){
            $order = explode(',',$order);

        }

        $order[0] = empty($order[0])? 'id' : $order[0];
        $order [1] = empty($order[1])? 'asc': $order[0]; 
        /*
        $where = empty($request->all()['where']) ? null : $request->all()['where'];

        $like = empty($request->all()['like']) ? null : $request->all()['like'];

        if($like){
            $like = explode(',',$like);
            $like[1] = '%' . $like[1] . '%';
        }

        */
        $result = $this->model->orderBy($order[0], $order[1])
        //->where(function($query) use($like){
        //    if($like){
        //        return $query->where($like[0], 'like', $like[1]);
        //    }
        //    return $query;
        //})
        //->where($where)
        ->paginate($limit);
        
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->model->create($request->all());
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->model->findOrFail($id);

        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $result = $this->model->FindOrFail($id);
        $result->update($request->all());
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->model->FindOrFail($id);
        $result->delete();
        return $result;
    }

}
