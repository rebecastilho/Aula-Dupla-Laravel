<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use DB;


class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::all();

        return view('index-cliente', compact('clientes'));
    }

    public function create(){
        return view('form-cliente');
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $cliente = Cliente::create($request->all());
            DB::commit();
            return back();
        }
        catch(Exception $e){
            DB::rollback();
        }
    }
}
