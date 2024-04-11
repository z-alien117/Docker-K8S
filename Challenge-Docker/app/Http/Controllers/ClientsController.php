<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::select('id','name');
        return DataTables::eloquent($clients)
            ->addColumn('options',function($clients){
                return
                "
                <button type='submit' class='btn btn-warning btn_edit' data-toggle='tooltip' title='Editar' data-original-title='Editar' get_url='". route('functions.edit_client', ['client'=>$clients->id]) ."'><i class='icon-line-edit-2'></i> Edit</button>
                <button type='submit' class='btn btn-danger btn_delete' data-toggle='tooltip' title='Eliminar' data-original-title='Eliminar' delete_url='". route('functions.delete_client', ['client'=>$clients->id]) ."'><i class='icon-trash2'></i> Delete</button>
                ";
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('clients.form')->render();
        return response()->json([
            "status"=>"successful",
            "view"=>$view
            ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required'
        ]);

        $client = new Clients([
            'name'=>$request->name
        ]);

        $client->save();

        return response()->json($client, 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $client)
    {
        $view = view('clients.form', ['client'=>$client])->render();
        return response()->json([
            "status"=>"successful",
            "view"=>$view
            ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $client_update)
    {
        $validatedData = $request->validate([
            'name'=>'required'
        ]);
        $client_update->name = $request->name;
        $client_update->save();
        return response()->json($client_update,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $client)
    {
        $client->delete();
        return response()->json(null,204);
    }
}
