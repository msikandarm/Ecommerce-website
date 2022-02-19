@extends('admin.layouts.app')
  <link href="{{ asset('admin_assets/assets/css/cards.css')}}" rel="stylesheet">
     @section('content')
             @foreach($products as $product)
                  <div class="card_data">
                    <div class="card">
                      <img src="{{asset('uploads/image/'.$product->file_path)}}" alt="Avatar" style="width:100%">
                        <div class="container">
                          <h4 id="title">Title:-<b><a href="{{route('layouts.postviews',  $product)}}">{{$product->title}}</a> </b><br>posted by:- <a href="{{route('layouts.profile',  $product->user)}}">{{ $product->user->name}}</a> </h4>
                            <p>
                              @php
                                $string = strip_tags($product->description);
                                  if (strlen($string) > 50) {
                                      $stringCut = substr($product->description, 0, 50);
                                      echo $stringCut.'.. <a href="'.route("layouts.postviews",$product->id).'">Read More</a>'; }
                                 else{ echo  $string; }
                              @endphp
                            </p>
                        </div>
                     </div>
                </div>
             @endforeach
@endsection
