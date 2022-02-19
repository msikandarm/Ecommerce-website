@extends('layout')
@section('content')
<br>
@if(Auth::user())
   <a href="{{ route('add.product') }}" class="btn btn-success btn-sm" title="Add New blog"> <i class="fa fa-plus" aria-hidden="true"></i> Add New blog</a>
@endif
   <a href="{{ url('/')}}" class="btn btn-danger btn-sm" title="Back to Home Page"> <i class="fa fa-plus" aria-hidden="true"></i> Back</a>
     <table class="table table-bordered table-hover table-striped">
       <thead>
          <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>File</th>
                <th>price</th>
                <th>date</th>
                <th>Action</th>
           </tr>
      </thead>
   <tbody>
        @foreach($products as $product)
              <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td><img src="{{asset('uploads/image/'.$product->file_path)}}" style="height:60px;width:60px"  alt=""></td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->date}}</td>
                    <td>
                       @if(Auth::user())
                          <a href="{{route('edit.product', $product)}}" class="btn btn-dark">Edit</a>
                            <form method="POST" action="{{ route('delete.product', $product->id) }}" accept-charset="UTF-8" style="display:inline">
                               @method('DELETE')
                                @csrf
                              <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                         @else
                           {{'pleas Login!'}}
                      @endif
                  </td>
               </tr>
          @endforeach
         </tbody>
     </table>






   @endsection
