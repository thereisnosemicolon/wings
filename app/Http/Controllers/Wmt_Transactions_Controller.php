<?php

namespace App\Http\Controllers;

use App\Models\WmtProduct;
use App\Models\WmtTransactionDetail;
use App\Models\WmtTransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Wmt_Transactions_Controller extends Controller
{

    public function index()
    {
        return view('transaction', [
            'title' => 'Wings Transactions Page',
            'listproduct' => WmtProduct::get(['id', 'product_name', 'product_unique_code', 'price', 'currency', 'discount', 'dimension', 'unit'])
        ]);
    }

    
    public function create()
    {
        //
    }
    
    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function showProductDetail(Request $request){
        $product = WmtProduct::Where('id', $request->id)->first();
        return response()->json(['listdata'=> $product]);
    }

    public function addTransactions(Request $request){
        $check = WmtTransactionHeader::Where('user', Auth::user()->id)->Where('date', date('Y-m-d', strtotime(now())))->Where('status', 'unpaid')->first();
        if($check == ''){    
            $product = WmtProduct::Where('id', $request->id)->first();
            $data['document_number'] = $this->generateDocNumber(Auth::user()->id);
            $data['document_code'] = 'TRX';
            $data['user'] = Auth::user()->id;
            $data['total'] = (int)$product->price - (int)$product->discount;
            $data['status'] = "unpaid";
            $data['date'] = now();
            $created = WmtTransactionHeader::create($data);
            $detail['header'] = $created->id;
            $detail['product_code'] = $product->id;
            $detail['price'] = $product->price;
            $detail['unit'] = $product->unit;
            $detail['quantity'] = 1;
            $detail['sub_total'] = (int)$product->price - (int)$product->discount;
            $detail['currency'] = $product->currency;
            WmtTransactionDetail::create($detail);
        } else {
            $product = WmtProduct::Where('id', $request->id)->first();
            $detail = WmtTransactionDetail::Where('header', $check->id)->where('product_code', $product->id)->first();
            if($detail == ''){
                $datadetail['header'] = $check->id;
                $datadetail['product_code'] = $product->id;
                $datadetail['price'] = $product->price;
                $datadetail['unit'] = $product->unit;
                $datadetail['quantity'] = 1;
                $datadetail['sub_total'] = (int)$product->price - (int)$product->discount;
                $datadetail['currency'] = $product->currency;
                WmtTransactionDetail::create($datadetail);
                $header['status'] = 'unpaid';
                $header['total'] = (int)$check->total + ((int)$product->price - (int)$product->discount);
                $header['updated_at'] = now();
                $check->update($header);
            } else {
                $datadetail['quantity'] = (int)$detail->quantity + 1;
                $datadetail['sub_total'] = (int)$detail->sub_total + ((int)$product->price - (int)$product->discount);
                $datadetail['updated_at'] = now();
                $detail->update($datadetail);
                $header['status'] = 'unpaid';
                $header['total'] = (int)$check->total + ((int)$product->price - (int)$product->discount);
                $header['updated_at'] = now();
                $check->update($header);
            } 
        }
        return response()->json(['status'=>200]);
    }

    public function generateDocNumber($id){
        $createDocNumber = str_pad($id, 4, "0", STR_PAD_RIGHT);
        if(WmtTransactionHeader::Where('document_code', "TRX")->where('document_number', $createDocNumber)->where('user', Auth::user()->id)->Where('date', date('Y-m-d', strtotime(now())))->count() > 0){
            $newid = (int)$createDocNumber + 1;
            return $this->generateDocNumber($newid);
        } else {
            return $createDocNumber;
        }
    }

    public function checkoutdetail(){
        $listtransaction = WmtTransactionHeader::With('getDetail')->Where('status', 'unpaid')->where('user', Auth::user()->id)->get();
        return response()->json(['status' => 200, 'messages' => $listtransaction]);
    }
    
    public function submitcheckout(Request $request){
        $array = json_decode($request->data);
        $totalprice = 0;
        for($i = 0; $i < count($array); $i++){
            $updatedetail['quantity'] = $array[$i]->qty;
            $updatedetail['sub_total'] = $array[$i]->sub_total;
            $updatedetail['updated_at'] = now();
            WmtTransactionDetail::Where('id', $array[$i]->id)->update($updatedetail);
            $totalprice = $totalprice + (int)$array[$i]->sub_total;
            $updateheader['total'] = $totalprice;
            $updateheader['status'] = 'paid';
            $updateheader['updated_at'] = now();
            WmtTransactionHeader::Where('id', $array[$i]->header)->update($updateheader);
        }
        return response()->json(['status' => 200]);
    }   
}
