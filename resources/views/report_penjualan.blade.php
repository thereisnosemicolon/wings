@extends('layout')
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Report Penjualan</h1>
    </div>

 <!-- Begin Page Content -->
    <div class="row">    
        <div class="col-xl-12 col-lg-12 col-md-12 d-flex justify-content-center">
            <div class="col-auto-mb-3" style="width:40rem">
              <div class="h-100" style="background-color:white;max-width:100%;">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Transaction</th>
                      <th>User</th>
                      <th>Total</th>
                      <th>Date</th>
                      <th>Item</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($transactionheader as $item)
                    @php
                        setlocale(LC_ALL, 'IND');
                        $newDate = strftime('%d %B %Y', strtotime($item->date));
                    @endphp
                    <tr>
                      <td>{{ $item->document_code }} - {{ $item->document_number }}</td>
                      <td>{{ $item->datauser->name }}</td>
                      <td>Rp. {{ number_format($item->total , 0, '', '.') }}</td>
                      <td>{{ $newDate }}</td>
                      
                      <td>
                        @foreach ($item->getDetail as $detail)
                        {{ $detail->detailProduct->product_name }} X {{ $detail->quantity }} <br>
                        @endforeach
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- Card Header - Dropdown -->
            </div>
          </div>
        </div>
    </div>
@endsection
