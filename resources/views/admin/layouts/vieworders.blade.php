
@extends('admin.layouts.admin')

@section('content')


      <table class="table table-bordered table-hover table-striped">
         <br>
           <br>
              <a href="{{url('/admin')}}"class="btn btn-danger">Back</a>
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Total Items</th>
                    <th>Total price</th>
                    <th>Status</th>

                  </tr>
                </thead>
           <tbody>
              @foreach($orders as $orderview)
                 <tr>
                    <td>{{$orderview->id}}</td>
                    <td>{{$orderview->user->name}}</td>
                    <td>{{$orderview->user->email}}</td>
                    <td>{{$orderview->totalitems}}</td>
                    <td>{{$orderview->totalprice}}</td>
                    <td>{{$orderview->status}}</td>
                 </tr>
               @endforeach
            </tbody>
          </table>
@endsection

