
@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Product</div>
     <div class="card-body">
                <form action="{{ route('update.product',$product) }}" method="post" enctype="multipart/form-data">
                     @csrf
                     @method("PATCH")
                          <input type="hidden" name="id" id="id" value="{{$product->id}}" id="id" />
                             <label>Title</label></br>
                               <input type="text" name="title" id="title" value="{{$product->title}}" class="form-control"></br>
                                  <label>Description</label></br>
                                     <input type="text" name="description" id="description" value="{{$product->description}}" class="form-control"></br>
                                       <label>File Select</label></br>
                                        <input type="file" name="file" id="file_path"  class="form-control">
                                      <img src="{{asset('uploads/image/'.$product->file_path)}}" style="height:60px;width:60px"  alt="">
                                    </br>
                                 <label>Price</label></br>
                              <input type="text" name="price" id="price" value="{{$product->price}}" class="form-control"></br>
                           <label>Date</label></br>
                        <input type="date" name="date" id="date" value="{{$product->date}}" class="form-control"></br>
                    <input type="submit" value="Edit Product " class="btn btn-success"></br>
                </form>
           </div>
      </div>
@stop
