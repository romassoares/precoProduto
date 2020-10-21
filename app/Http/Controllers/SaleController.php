<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\Sale;
use App\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    private $obj;
    private $prod;
    public function __construct(Sale $obj, Product $prod, Items $item)
    {
        $this->obj = $obj;
        $this->prod = $prod;
        $this->item = $item;
    }

    public function index()
    {
        $sales = $this->obj->paginate(10);
        $clients = Client::withTrashed()->get();
        return view('system.sales.index', ['sales' => $sales, 'clients' => $clients]);
    }

    public function store(Request $request)
    {
        $products = Product::all();
        $client = Client::find($request->client_id);
        if($client){
            $save = new Sale();
            $result = $save->create(['client_id' => $client->id]);
                if($result){
                    $items = $this->item->get()->where('sale_id',$result->id);
                    return view('system.sales.form', ['products' => $products, 'client' => $client, 'sale'=>$result, 'items'=>$items]);
                }
            }else{
                $client = Client::create(['name' => 'default']);
                $save = new Sale();
                $result = $save->create(['client_id' => $client->id]);
                if($result){
                    $items = $this->item->get()->where('sale_id',$result->id);
                    return view('system.sales.form', ['products' => $products, 'client' => $client, 'sale'=>$result, 'items'=>$items]);
            }
        }
    }

    public function addProduct(Request $request, $id)
    {
        $existProduct = $this->prod->findorfail($request->product_id); 
        if($existProduct){
            $new = new Items();
            $saleProdExist = $this->item->get()->where('product_id',$request->product_id)->where('sale_id',$id);
            if(count($saleProdExist) == 0 && $existProduct->amount >= $request->amount){
                $save = $new->create([
                    'sale_id' => $id,
                    'product_id'=>$existProduct->id,
                    'price'=> $existProduct->price,
                    'amount'=>$request->amount
                ]);
                $amountProd = $existProduct->update(['amount' => $existProduct->amount-$request->amount
                ]);
                return $this->Objs($save);
            } elseif (count($saleProdExist) > 0 && $existProduct->amount >= $request->amount ) {
                foreach($saleProdExist as $p){
                    if($p->product_id==$request->product_id){
                        return $this->Amount($p, $existProduct,$request);
                    }
                }
            }else{
                return redirect()->route('venda.edit', $id)->with('error', 'estoque insuficiente');
            }        
        }
    }
            
    public function Amount($sale,$prod,$request){
        $amount = $sale->amount+$request->amount;
        $amountSale = $sale->update(['amount' => $amount]);
        $amountProd = $prod->update(['amount' => $prod->amount-$request->amount]);
        return $this->Objs($sale);
    }

    public function Objs($sale){
        $products = Product::all();
        $items = $this->item->get()->where('sale_id',$sale->id);
        $priceTotal = $items->reduce(function($carry,$item){
            $priceItem = $item->price * $item->amount;
            return $carry + $priceItem; 
        });
        $save = DB::table('sales')
            ->where('id', $sale->id)
            ->where('client_id', $sale->client_id)
            ->update(['price' => $priceTotal]);
        if($save){
            $client = Client::findorfail($sale->client_id);
            $items = $this->item->get()->where('sale_id',$sale->id);
            $saleN = Sale::findorfail($sale->id);
            return view('system.sales.form', ['products' => $products, 'client' => $client, 'items'=>$items, 'sale'=>$saleN])->with('success', 'cadastrado com successo');
        }
    }

    public function edit($id)
    {
        $sale = Sale::findorfail($id);  
        $items = $this->item->get()->where('sale_id',$id);
        $client = Client::findorfail($sale->client_id); 
        $products = Product::all();
        return view('system.sales.form', ['products' => $products, 'client' => $client, 'items'=>$items, 'sale'=>$sale]);
    }

    public function show($id)
    {
        $sale = Sale::findorfail($id);  
        $items = Items::get()->where('sale_id',$id);
        return view('system.sales.show', ['items'=>$items, 'sale'=>$sale]);
    }
    public function destroy($id)
    {
        $product = $this->obj->findorfail($id);
        if($product){
            $result = $product->delete();
            if($result){
                return redirect()->route('venda')->with('success','venda removido com sucesso');
            }
        }else{
            return redirect()->route('venda')->with('warning', 'erro, venda não encontrado');
        }
    }

    public function archive()
    {
        $result = $this->obj->withTrashed()->where('deleted_at', '!=', null)->get();
        return view('system/sales/deleted', compact('result'));
    }

    public function restory($id){
        $result = $this->obj->withTrashed()->where('id',$id)->first();
        if($result){
            $res = $result->restore();
            if($res){
                return redirect()->route('venda.show',$id)->with('success','arquivo restaurado com sucesso');
            }
        }
    }
}


