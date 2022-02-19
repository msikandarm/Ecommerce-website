@extends('partials.header')
@include('partials.css')
@include('partials.scripts')
@php
    $total=0;
@endphp
 @section('content')

    <div class="container">
      <div class="row border-top border-bottom">
        @php $cartTotlal = 0; @endphp
        @foreach($prod as $p)
            <div class="col-md-6 offset-md-4 "> <img src="{{asset('uploads/image/'.$p->product->file_path)}}" alt="#" width="30%"></div>
          <div class="col-2">
                <div class="col-2"> <h3> {{$p->product->title}}</h3></div>
                   <h3>{{$totalPrice = $p->product->price *$p->prod_qty }}</h3>
                   <p>{{$p->product->description}}</p>
                 <label for="Quantity">Quantity</label>
                 <input type="hidden" class="prod-id" value="{{$p->product->id}}" >
               <div class="input-group text-center mb-3" style="130px;">
                  <button class="input-group-text decrement-btn changequantity" data-id="value-{{$loop->iteration}}" data-product-id="{{$p->product->id}}" >-</button>
                    <input type="text" name="quantity" id="value-{{$loop->iteration}}" class="form-control text-center qty-input" value="{{$p->prod_qty}}">
                 <button class="input-group-text increment-btn changequantity" data-product-id="{{$p->product->id}}"  data-id="value-{{$loop->iteration}}">+</button>
               </div>
          </div>
          @php
          $cartTotlal += $totalPrice;
          @endphp
       @endforeach
   </div>
<div class="row item">
    <div class="col offset-3 ">
        <div class="card-footer">
            {{ $cartTotlal}}
           <div class="checkout">
            <a href="{{route('checkout')}}" class="btn btn-danger">Proceed To checkout</a>
           </div>
        </div>
    </div>

    </div>
</div>
</div>

    @endsection


<script>
$(document).ready(function(){
 $('.increment-btn').click(function(){

    var id = $(this).attr('data-id');
    var prod_id = $(this).attr('data-product-id');
    var inc_value=$('#'+id).val();
    var qty=parseInt(inc_value,10);
    qty=isNaN(qty) ? 0: qty;
    if(qty < 10){
        qty++;
        $('#'+id).val(qty);
     }

    console.log(qty, prod_id);
        $.ajax({
        method:"POST",
        url:"update.cart",
        data:{
            'prod_id': prod_id,
            'prod_qty': qty
        },
        success: function(response){
            console.log(response);
        }
        });
 });
 $('.decrement-btn').click(function(){

    var id = $(this).attr('data-id');
    var prod_id = $(this).attr('data-product-id');
    var dec_value=$('#'+ id).val();
    var  qty=parseInt(dec_value);
    qty=isNaN( qty) ? 0:  qty;
    if( qty > 1){
        qty--;
        $('#'+id).val( qty);
    }
    console.log(qty, prod_id);
        $.ajax({
        method:"POST",
        url:"update.cart",
        data:{
            'prod_id': prod_id,
            'prod_qty': qty
        },
        success: function(response){
            console.log(response);
        }
        });
 });
$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':'{{ csrf_token()}}'
    }
});

 $('.changequantity').click(function(){


});


});


</script>
