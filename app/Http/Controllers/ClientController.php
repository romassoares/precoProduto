<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $obj;
    public function __construct(Client $obj)
    {
        $this->obj = $obj;
    }

    public function index()
    {
        $clients = $this->obj->paginate(10);
        return view('system/Client/index', ['clients' => $clients]);
    }

    public function create()
    {
        return view('system/Client/form');
    }

    public function store(ClientRequest $request)
    {
        $client = $request->only(['name', 'city', 'district', 'street', 'number', 'contact']);
        $salvo = $this->obj->cstore($client);
        if ($salvo) {
            return redirect()->route('cliente.show', $salvo->id);
        } else {
            return redirect()->route('cliente.create', ['client' => $client]);
        }
    }

    public function show($id)
    {
        dd('shoe');
        $result = $this->obj->find($id);
        return view('system/Client/show', ['client' => $result]);
    }

    public function edit($id)
    {
        $client = $this->obj->find($id);
        return view('system/Client/form', ['result' => $client]);
    }

    public function update(ClientRequest $request, $id)
    {
        $client = $request->only(['name', 'city', 'district', 'street', 'number', 'contact']);
        $result = $this->obj->cUpdate($client, $id);
        $client = $this->obj->find($id);
        return view('system/Client/show', ['client' => $client]);
    }

    public function destroy($id)
    {
        $client = $this->obj->findorfail($id);
        if($client){
            $result = $client->delete();
            if($result){
                return redirect()->route('cliente')->with('success','cliente removido com sucesso');
            }
        }else{
            return redirect()->route('cliente')->with('warning', 'erro, cliente não encontrado');
        }
    }

    public function archive()
    {
        dd('oi');
        $result = $this->obj->withTrashed()->where('deleted_at', '!=', null)->get();
        return view('system/Client/deleted', compact('result'));
    }

    public function restory($id){
        $result = $this->obj->withTrashed()->where('id',$id)->first();
        if($result){
            $res = $result->restore();
            if($res){
                return redirect()->route('cliente.show',$id)->with('success','arquivo restaurado com sucesso');
            }
        }
    }
}

