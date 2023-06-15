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
                  <th>Customers Name</th>
                  <th>Price</th>
                  <th>Images</th>
                  <th>Status Payment</th>

                </tr>
              </thead>
              <tbody>
                  <?php $no = 1;?>
                  @foreach ($getInvest as $item)
                      <tr>
                          <td>{{$no++}}</td>
                          <td>{{$item->invest_name}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->price}}</td>
                          <td>
                            <img src="{{asset($item->images) }}" style="height: 50px;width:50px;">                                 
                          </td>
                          <td>
                            <div>
                              @if ($item->status_payment == "belum dibayar")
                                <a href="{{route('orderc.acc', $item->id)}}" type="submit" onclick="confirm('Ingin menerima pembayaran?')" class="btn btn-info">Acc Bayar</a>
                                  
                              @else
                                <a type="button" class="btn btn-success">Sudah Bayar</a>

                              @endif
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