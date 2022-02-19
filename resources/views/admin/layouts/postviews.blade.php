
  <div class="card_data">
    <div class="card">
      <img src="{{asset('uploads/image/'.$product->file_path)}}" alt="Avatar" style="width:100%">
        <div class="container">
           <h4 id="title">Title:-<b>{{$product->title}}</a> </b><br>posted by:- {{ $product->user->name}} </h4>
          <p><h4>Description:-</h4>{{$product->description}}</p>
       </div>
     </div>
   </div>
