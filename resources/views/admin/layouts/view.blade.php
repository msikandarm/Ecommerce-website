
@extends('admin.layouts.admin')

@section('content')
  @if(Auth::user())
     <a href="{{ url('/blogs/create') }}" class="btn btn-success btn-sm" title="Add New blog"> <i class="fa fa-plus" aria-hidden="true"></i> Add New blog</a>
    @endif

      <table class="table table-bordered table-hover table-striped">
         <br>
           <br>
              <a href="{{url('/home')}}"class="btn btn-danger">Back</a>
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
                      <a href="{{route('layouts.edit', $product)}}" class="btn btn-dark btn-sm">Edit</a>
                        <form action="{{ route('blog.destroy', $product->id) }}" method="post"  accept-charset="UTF-8" style="display:inline">
                             @method('DELETE')
                             @csrf
                             <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                          </form>
                      </td>
                 </tr>
               @endforeach
            </tbody>
          </table>
@endsection
