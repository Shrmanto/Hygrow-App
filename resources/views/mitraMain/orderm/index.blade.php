@component('mitraMain.landing')

@section('content')       
            <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                        <h3>Product Order</h3>
                      <!-- table -->
                      <table class="table datatables" id="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Date Order</th>
                            <th>Product Id</th>
                            <th>Images</th>
                            <th>Status Payment</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tbody>
                                <?php $no = 1;?>
                                @foreach ($getOrders as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->date_order}}</td>
                                        <td>{{$item->product_id}}</td>
                                        <td>
                                          <img src="{{asset($item->images) }}" style="height: 50px;width:50px;">                                 
                                        </td>
                                        <td>
                                          <div>
                                            @if ($item->status_payment == "belum dibayar")
                                            
                                            <a type="button" class="btn btn-info text-white">Belum Dibayar</a>
                                            @else
                                            <a href="{{route('orderc.acc', $item->id)}}" type="submit" onclick="confirm('Ingin menerima pembayaran?')" class="btn btn-info">Acc Bayar</a>
              
                                            @endif
                                        </div>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card shadow mt-5">
                    <div class="card-body">
                        <h3>Invest Order</h3>
                      <!-- table -->
                      <table class="table datatables" id="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Date Order</th>
                            <th>Product Id</th>
                            <th>Images</th>
                            <th>Status Payment</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tbody>
                                <?php $no = 1;?>
                                @foreach ($getOrders as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->date_order}}</td>
                                        <td>{{$item->product_id}}</td>
                                        <td>
                                          <img src="{{asset($item->images) }}" style="height: 50px;width:50px;">                                 
                                        </td>
                                        <td>
                                          <div>
                                            @if ($item->status_payment == "belum dibayar")
                                            
                                            <a type="button" class="btn btn-info text-white">Belum Dibayar</a>
                                            @else
                                            <a href="{{route('orderc.acc', $item->id)}}" type="submit" onclick="confirm('Ingin menerima pembayaran?')" class="btn btn-info">Acc Bayar</a>
              
                                            @endif
                                        </div>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
@endsection

@endcomponent