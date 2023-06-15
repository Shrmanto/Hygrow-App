@component('layouts.app')

@section('content')       
  <!-- Small table -->
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-body">
            <!-- table -->
            <table class="table datatables" id="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Product Name</th>
                  <th>Partners Name</th>
                  <th>Price</th>
                  <th>Images</th>
                  <th>Stock</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                  <?php $no = 1;?>
                  @foreach ($getProducts as $item)
                      <tr>
                          <td>{{$no++}}</td>
                          <td>{{$item->product_name}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->price}}</td>
                          <td>
                            <img src="{{asset($item->images) }}" style="height: 50px;width:50px;">                                 
                          </td>
                          <td>{{$item->stock}}</td>
                          <td>{{$item->description}}</td>
                          <td>
                          </td>
                      </tr>
                      
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection 

@endcomponent