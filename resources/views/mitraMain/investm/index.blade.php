@component('mitraMain.landing')

@section('content')
        <div class="col-md-12">
            <a type="button" href="{{url('/investm/add')}}" class="btn mb-2 btn-outline-success"><i class="fas fa-user-plus"></i></a>
        </div>        
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
                            <th>Price</th>
                            <th>Images</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Contract</th>
                            <th>Description</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($getInvest as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->invest_name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                      <img src="{{asset($item->images) }}" style="height: 50px;width:50px;">                                 
                                    </td>
                                    <td>{{$item->stock}}</td>
                                    <td>{{$item->profit}}</td>
                                    <td>{{$item->contract}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        <div>
                                            <a href="{{url('/investm/edit/'.$item->id.'')}}" type="button" class="btn btn-warning"><i class="fas fa-edit" style="color: #ffffff;"></i></a>
                                            <a href="{{url('/investms/delete/'.$item->id.'')}}" type="submit" onclick="confirm('yakin menghapus data?')" class="btn btn-danger"><i class="far fa-trash-alt" style="color: #ffffff;"></i></a>
                                        </div>
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