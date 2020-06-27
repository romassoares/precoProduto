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
        $clients = $this->obj->all();
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
        return redirect()->route('cliente.show', ['client' => $result]);
    }

    public function destroy(Client $client)
    {
        //
    }
}
