@extends('layout')
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transactions</h1>
    </div>

 <!-- Begin Page Content -->
    <div class="row"> 
        <div class="col-xl-12 col-lg-12 col-md-12 d-flex justify-content-center">
            <div class="col-auto-mb-3" style="width:40rem">
              <div class="card shadow mb-4 h-100" style="background-color:white;max-width:100%;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div id="stepper1" class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                      <div class="step" data-target="#test-l-1">
                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger1" aria-controls="test-l-1">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">Product List</span>
                        </button>
                      </div>
                      <div class="bs-stepper-line"></div>
                      <div class="step" data-target="#test-l-2">
                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">Checkout</span>
                        </button>
                      </div>
                      <div class="bs-stepper-line"></div>
                      <div class="step" data-target="#test-l-3">
                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-3">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">Success</span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content" style="max-width:100%">
                      <form onSubmit="return false">
                        <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
                          @foreach ($listproduct as $item)
                          <div class="form-group">
                            <div class="col-lg-12 col-md-6 col-xl-12">
                              <div class="row">
                                <div class="col-lg-3">
                                  <img 
                            src="data:image/jpeg;base64,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" 
                            style="max-width:50%"
                            alt="">
                                </div>
                                <div class="col-lg-4">
                                  <h5 class="text-black fw-bold" style="color:black">{{ $item->product_name }}</h5>
                                  <p class="text-black">{{ $item->currency }}{{ $item->price }}</p>
                                </div>
                                <div class="col-lg-4 mt-1 align-items-center">
                                  <button class="btn btn-primary btn-product-detail" style="background-color: deepskyblue; color:white;border-color: deepskyblue" data-bs-toggle="modal" data-bs-target="#DataModal" data-id={{ $item->id }} data-bs-whatever="Pembelian Produk {{ $item->product_name }}"><i class="fas fa-fw fa-shopping-cart"></i>BUY</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                          <hr>
                          <button class="btn" id="btn-checkout-detail" style="margin-left:40%;background-color: deepskyblue; color:white;border-color: deepskyblue" onclick="stepper1.next();">Checkout</button>
                        </div>
                        <div id="test-l-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger2">
                          <div id="test-l-2-content">

                          </div>
                        </div>
                        <div id="test-l-3" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger3">
                          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </symbol>
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </symbol>
                          </svg>
                          <div id="test-l-3-content"></div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="DataModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" class="text-black">
            <h5 class="modal-title">Product Detail</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <input type="hidden" id="id" readonly="true">
          </div>
          <div class="modal-body" class="text-black">
            <div class="col-lg-12 col-xl-12 col-md-6">
              <div class="row">
                <div class="col-lg-6" id="product-picture">
                
                </div>
                <div class="col-lg-6 mt-3" id="product-detail-content">
  
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    var DataModal = document.getElementById('DataModal');
    DataModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var recipient = button.getAttribute('data-bs-whatever');
        var modalTitle = DataModal.querySelector('.modal-title');
        modalTitle.textContent = recipient;
    });
    var timerInterval;

    $(document).on('click', '.btn-product-detail', function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      $('#id').val(id);
      $.ajax({
        type: "GET",
        url: "transactions/showProductDetail",
        data: {id:id},
        dataType: "JSON",
        success: function (response) {
          var discount = response.listdata.discount;
          var price = response.listdata.price;
          $('#product-picture').empty().append('<img src="https://icon-library.com/images/icon-product/icon-product-0.jpg" style="max-width:100%" alt="">');
          if(discount > 0){
            discount = price - discount;
            $('#product-detail-content').empty().append('<h5 id="nama-produk">'+response.listdata.product_name+'</h5>\
                <p id="price-before-discount" class="text-decoration-line-through">'+response.listdata.currency+' '+addCommas(response.listdata.price)+'</p>\
                <p id="price" class="fw-bold">'+response.listdata.currency+' '+addCommas(discount)+'</p>\
                <p class="fw-bold">Dimension : <span id="dimension">'+response.listdata.dimension+'</span></p>\
                <p class="fw-bold">Unit : <span id="unit" class="text-uppercase">'+response.listdata.unit+'</span></p>\
            ');
          } else{
            $('#product-detail-content').empty().append('<h5 id="nama-produk">'+response.listdata.product_name+'</h5>\
                <p id="price" class="fw-bold">'+response.listdata.currency+' '+addCommas(price)+'</p>\
                <p class="fw-bold">Dimension : <span id="dimension">'+response.listdata.dimension+'</span></p>\
                <p class="fw-bold">Unit : <span id="unit" class="text-uppercase">'+response.listdata.unit+'</span></p>\
            ');
          }
        }
      });
      $('.modal-footer').empty();
      $('.modal-footer').append('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>\
      <button type="button" class="btn btn-primary btn_checkout">Save</button>');
    });

    $(document).on('click', '#btn-checkout-detail', function(){
      checkoutdetail();
    });

    $(document).on('click', '.btn_checkout', function(e){
      e.preventDefault();
      var id = $("#id").val();
      $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: "POST",
        url: "/transactions/addTransactions",
        data: {id:id},
        dataType: "JSON",
        success: function (response) {
          if(response.status == 200){
            Swal.fire({ 
              title: 'Success!', 
              text: 'Berhasil menambahkan data ke dalam checkout anda!', 
              timer: 1000, 
              timerProgressBar: true, 
              willClose: () => { 
                clearInterval(timerInterval); 
              } 
            }).then(() => {
              checkoutdetail();
              $('#DataModal').modal('hide');
            }); 
          }
        }
      });
    });

    function addCommas(nStr){
      nStr += '';
      let x = nStr.split('.');
      let x1 = x[0];
      let x2 = x.length > 1 ? '.' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
      }    
      return x1 + x2;
    }

    function checkoutdetail(){
      $('#test-l-2-content').empty();
      $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: "post",
        url: "transactions/checkoutdetail",
        success: function (response) {
          for(var i = 0; i < response.messages.length; i++){
            for(var j=0; j < response.messages[i].get_detail.length; j++){
              $('#test-l-2-content').append('<div class="transaction-detail form-group">\
              <div class="col-lg-12 col-md-6">\
                <div class="row">\
                  <div class="headerid col-lg-5" id="#checkout-picture" data-header='+response.messages[i].id+'>\
                    <img src="https://icon-library.com/images/icon-product/icon-product-0.jpg" style="max-width:50%" alt=""></img>\
                  </div>\
                  <div class="col-lg-7" id="#checkout-detail" data-header='+response.messages[i].id+' data-transaction-detail='+response.messages[i].get_detail[j].id+'>\
                    <h5 class="fw-bold">'+response.messages[i].get_detail[j].detail_product.product_name+'</h5>\
                      <div class="row">\
                        <div class="col-lg-4">\
                          <input type="text" id="qty" class="form-control qty-product" data-id='+response.messages[i].get_detail[j].id+' value='+response.messages[i].get_detail[j].quantity+'>\
                        </div>\
                        <div class="col-lg-3">\
                          <p class="fw-bold">'+response.messages[i].get_detail[j].unit+'</p>\
                        </div>\
                      </div>\
                    <p class="fw-bold">Subtotal: <span class="ms-4">'+response.messages[i].get_detail[j].currency+'</span> <span id="price'+response.messages[i].get_detail[j].id+'" data-value'+response.messages[i].get_detail[j].sub_total+'>'+addCommas(response.messages[i].get_detail[j].sub_total)+'</span></p>\
                    <input type="hidden" id="true_price" value='+response.messages[i].get_detail[j].detail_product.price+'>\
                    <input type="hidden" id="true_discount" value='+response.messages[i].get_detail[j].detail_product.discount+'>\
                    <input type="hidden" id=true_total_price'+response.messages[i].get_detail[j].id+' class="true_total_price" value='+response.messages[i].get_detail[j].sub_total+'>\
                    <input type="hidden" class="header_id" value='+response.messages[i].id+'>\
                    <input type="hidden" class="transaction_id" value='+response.messages[i].get_detail[j].id+'>\
                  </div>\
                </div>\
              </div>\
              </div>');   
            }
          }
          if(response.messages.length == 0){
            $('#test-l-2-content').append('<div class="row justify-content-center"><div class="col-lg-1"><button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>\
              </div></div>');
          } else {
            $('#test-l-2-content').append('<div class="row justify-content-center"><div class="col-lg-2"><button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>\
            </div><div class="col-lg-2"><button class="btn btn-primary" id="btn_confirm" onclick="stepper1.next()">Confirm</button></div></div>')
          }
          
        } 
      });
    }

    $(document).on('click', '#btn_confirm', function(e){
      var array = [];
      var transactiondetail = $('.transaction-detail');
      var qtyproduct = $('.qty-product');
      var total_price_product = $('.true_total_price');
      var headerid = $('.header_id');
      var transactionid = $('.transaction_id');
      for(var i = 0; i<transactiondetail.length; i++){
        array[i] = {
          "id": parseInt(transactionid[i].value),
          "header": parseInt(headerid[i].value),
          "qty": parseInt(qtyproduct[i].value),
          "sub_total": parseInt(total_price_product[i].value)
        }
      }
      var data = JSON.stringify(array);
      Swal.fire({
        title: 'Are you sure?',
        text: "Please double check your checkout",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: "POST",
            url: "transactions/submitcheckout",
            data: {data:data},
            dataType: "JSON",
            success: function (response) {
              if(response.status == 200){
                Swal.fire(
                  'Success!',
                  'Your Payment has been successful',
                  'success'
                ).then(() => {
                  $('#test-l-2-content').empty();
                  $('#test-l-2-content').append('<div class="row justify-content-center"><div class="col-lg-1"><button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>\
                  </div></div>');
                  $('#test-l-3-content').empty();
                  $('#test-l-3-content').append('<div class="form-group">\
                    <div class="col-lg-12 col-md-6">\
                      <div class="alert alert-success d-flex align-items-center" role="alert">\
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>\
                      <div>\
                      Success to process your transactions!\
                    </div>\
                    </div>\
                    </div>\
                    </div')
                  $('#test-l-3-content').append('<div class="row justify-content-center"><div class="col-lg-2"><button class="btn btn-primary mt-5" onclick="stepper1.previous()">Previous</button>\
                  </div><div class="col-lg-2"></div></div>')
                }); 
              }
            }
          });
        }
      });
    });

    $(document).on('change', '#qty', function(e){
      var id =$(this).attr('data-id');
      var newqty = $(this).val();
      var newprice = parseInt(newqty) * parseInt($('#true_price').val() - $('#true_discount').val());
      $('#price'+id+'').html(addCommas(newprice)); 
      $('#true_total_price'+id+'').val(newprice);
    });

  });
</script>
@endpush