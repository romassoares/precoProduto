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
        $result = Sale::get()->all();
        $clients = Client::get()->all();
        return view('system.sales.index', ['sales' => $result, 'clients' => $clients]);
    }

    public function store(Request $request)
    {
        $products = Product::all();
        $client = Client::findorfail($request->client_id);
        if($client){
            $save = new Sale();
            $result = $save->create([
                'client_id' => $client->id 
                ]);
                if($result){
                    $items = $this->item->get()->where('sale_id',$result->id);
                    return view('system.sales.form', ['products' => $products, 'client' => $client, 'sale'=>$result, 'items'=>$items]);
            }
        }else{
            // $this->index();
        }
    }

    public function addProduct(Request $request, $id)
    {
        $existProduct = $this->prod->findorfail($request->product_id); 
        if($existProduct){
            $new = new Items();
            $save = $new->create([
                'sale_id' => $id,
                'product_id'=>$existProduct->id,
                'price'=> $existProduct->price,
                'amount'=>$request->amount
                ]);
                if($save){
                    $products = Product::all();
                    $sale = Sale::findorfail($id);
                    $items = $this->item->get()->where('sale_id',$sale->id);
                    $priceTotal = $items->reduce(function($carry,$item){
                        $priceItem = $item->price * $item->amount;
                        return $carry + $priceItem; 
                    });
                    $save = DB::table('sales')
                    ->where('id', $id)
                    ->where('client_id', $sale->client_id)
                    ->update(['price' => $priceTotal]);
                    $client = Client::findorfail($sale->client_id);
                    $items = $this->item->get()->where('sale_id',$id);
                    $saleN = Sale::findorfail($id);
                    // dd($saleN);
                return view('system.sales.form', ['products' => $products, 'client' => $client, 'items'=>$items, 'sale'=>$saleN]);
            }
        }
    }

    public function edit($id)
    {
        
    }

    public function Qnt($id, $ing)
    {
        
    }
    public function addQnt(Request $qnt, $product_id)
    {
       
    }
}
