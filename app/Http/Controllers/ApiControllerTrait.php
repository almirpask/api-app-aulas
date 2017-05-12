<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait ApiControllerTrait
{
    public function index(Request $request)
    {   
        //$result = $this->model->all();
        //$limit = empty($request->all()['limit']) ? 15 : $request->all()['limit'];
        //
        //$order = empty($request->all()['order']) ? null : $request->all()['order'];
        //
        //if($order != null){
        //    $order = explode(',',$order);
        //
        //}
        //
        //$order[0] = empty($order[0])? 'id' : $order[0];
        //$order [1] = empty($order[1])? 'asc': $order[0]; 
        /*
        $where = empty($request->all()['where']) ? null : $request->all()['where'];

        $like = empty($request->all()['like']) ? null : $request->all()['like'];

        if($like){
            $like = explode(',',$like);
            $like[1] = '%' . $like[1] . '%';
        }

        */
       // $result = $this->model->orderBy($order[0], $order[1])
        //->where(function($query) use($like){
        //    if($like){
        //        return $query->where($like[0], 'like', $like[1]);
        //    }
        //    return $query;
        //})
        //->where($where)
       // ->paginate($limit);
       try{
            $result = $this->model->all();

            switch (get_class($this->model)) {
                case 'App\Questionario':
                   
                    foreach ($result as $key => $value) {
                        
                        $result[$key]->disciplina_nome = $result[$key]->disciplina->nome;
                        

                    }
                    
                    return json_encode($result);
                    break;
                case 'App\Resposta';
                    //$key = 0;
                    //foreach ($result as $key => $value) {
                      //  echo $value;
                    //}
                    return json_encode($result);
                    //return $key;
                    break;
                case 'App\Enunciado';
                    //$key = 0;
                    //foreach ($result as $key => $value) {
                        //echo $value;
                    //}

                    return json_encode($result);
                    break;
                case 'App\Alternativa';
                    //$key = 0;
                    //foreach ($result as $key => $value) {
                        //echo $value;
                    //}

                    return json_encode($result);
                    break;
                default:
                    # code...
                    break;
            }
           
           
           $class = get_class($this->model);
           return ($class == 'App\Alternativa')? 'sim' : 'nao';
           
           //if(isset($this->model->disciplina)){
            //$result->disciplina_id = $this->model->disciplina->nome;

            //}

       }catch(\Exception $e){
           return $e;
       }
        
        return json_encode($result);
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
