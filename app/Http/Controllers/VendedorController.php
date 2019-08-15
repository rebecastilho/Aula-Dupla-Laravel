<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VendedorRequest;
use App\Vendedor;
use App\Cliente;
use DB;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $vendedores = Vendedor::all();
        $vendedoresInativos = Vendedor::onlyTrashed()->get();
        return view('index-vendedor', compact('vendedores','vendedoresInativos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('form-vendedor', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendedorRequest $request)
    {
        try{
            DB::beginTransaction();

            $vendedor = Vendedor::create($request->all());
          
            DB::commit();
            return back();
        }catch(Exception $e){
            DB::rollback();
        }
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
        $vendedor = Vendedor::findOrFail($id);
        $clientes = Cliente::all();
        return view('form-vendedor',compact('vendedor','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendedorRequest $request,$id)
    {
        try{
            DB::beginTransaction();
            
            $vendedor = Vendedor::findOrFail($id);
            $vendedor->update($request->all());
            
            DB::commit();
            return back();

        }
        catch(Exception $e){
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->delete();
        return back();
     }

     public function restore($id){
         $vendedor = Vendedor::onlyTrashed()->findOrFail($id);
         $vendedor->restore();
         return back();
     }

}
