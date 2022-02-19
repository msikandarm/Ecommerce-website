@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">Add Product</div>
  <div class="card-body">
      <form action="{{ route('added') }}" method="post" enctype="multipart/form-data">
       @csrf
        <label>Title</label></br>
           <input type="text" name="title" id="title" class="form-control"></br>
             <label>Description</label></br>
               <input type="text" name="description" id="description" class="form-control"></br>
                  <label>Select File</label></br>
                    <input type="file" name="file"  class="form-control"></br>
                   <label>Price</label></br>
                  <input type="text" name="price" id="price" class="form-control"></br>
                <label>Date</label></br>
              <input type="date" name="date" id="date" class="form-control"></br>
            <input type="submit" value="Add Product" class="btn btn-success"></br>
         </form>
     </div>
  </div>
@stop
