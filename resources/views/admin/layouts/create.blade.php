
@extends('admin.layouts.layout')
@section('content')
<div class="card">
  <div class="card-header">  <a href="{{url('/admin')}}"class="btn btn-danger">Back</a>&nbsp;&nbsp;&nbsp;Add Product </div>
    <div class="card-body">
       <form action="{{ url('/added') }}" method="post" enctype="multipart/form-data">
         @csrf
             <label>Title</label></br>
                 <input type="text" name="title" id="title" class="form-control"></br>
             <label>Description</label></br>
                 <input type="text" name="description" id="description" class="form-control"></br>
             <label>Select File</label></br>
                 <input type="file" name="file" id="file" class="form-control"></br>
             <label>Price</label></br>
                 <input type="text" name="price" id="price" class="form-control"></br>
             <label>Date</label></br>
                 <input type="date" name="date" id="date" class="form-control"></br>
             <input type="submit" value="Save" class="btn btn-success"></br>
         </form>
      </div>
  </div>
@stop
