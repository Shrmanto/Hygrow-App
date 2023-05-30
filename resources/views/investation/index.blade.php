@component('layouts.app')

@section('content')
        <!-- <div class="col-md-12">
            <button type="button" onclick="addForm()" class="btn mb-2 btn-outline-success"><span class="fe fe-upload-cloud fe-16"></span></button>
        </div>         -->
            <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                      <!-- table -->
                      <table class="table datatables" id="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Name Investation</th>
                            <th>Price</th>
                            <th>Profit</th>
                            <th>Contract</th>
                            <th>Description</th>                           
                            <!-- <th>Customer/Mitra</th>                            -->
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- @include('partners.form')
                @endsection -->

@section('script')
    <script type="text/javascript">
        var table, save_method;
        $(function(){
            table = $('#table').DataTable({
                "processing" : true,
                'responsive' : true,
                'scrollY'     : true,
                'autoWidth'   : true,
                "ajax" : {
                "url" : "{{ route('investasi.data') }}",
                "type" : "GET"
                    }
            });
            $('#modal-form form').on('submit', function(e){
                if(!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if(save_method == "add") url = "{{ route('investation.store') }}";
                    else url = "investations/"+id;
                    $.ajax({
                        url : url,
                        type : "POST",
                        data : $('#modal-form form').serialize(),
                        success : function(data){
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                        },
                        error : function(){
                            alert("Tidak dapat menyimpan data!");
                        }
                    });
                    return false;
                }
            });
        });

        // function addForm(){
        //     save_method = "add";
        //     $('input[name=_method]').val('POST');
        //     $('#modal-form').modal('show');
        //     $('#modal-form form')[0].reset();
        //     $('.modal-title').text('Add Data');
        // }

        // function editForm(id){
        //         save_method = "edit";
        //         $('input[name=_method]').val('PATCH');
        //         $('#modal-form form')[0].reset();
        //         $.ajax({
        //             url : "investations/"+id+"/edit",
        //             type : "GET",
        //             dataType : "JSON",
        //             success : function(data){
        //                 $('#modal-form').modal('show');
        //                 $('.modal-title').text('Edit Data');

        //                 $('#id').val(investations.id);
        //                 $('#name_invest').val(investations.name_invest);
        //                 $('#price').val(investations.price);
        //                 $('#profit').val(investations.profit);
        //                 $('#contract').val(investations.contract);
        //                 $('#description').val(investations.description);
        //                 // $('#customer_partner_id').val(investations.customer_partner_id);
        //             },
        //             error : function(){
        //                 alert("Tidak dapat menampilkan data!");
        //             }
        //         });
        //     }

        //     function deleteData(id) {
        //         $.ajax({
        //             url : "investations/"+id,
        //             type : "POST",
        //             data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
        //             success : function(data) {
        //                 table.ajax.reload();
        //             },
        //             error : function () {
        //                 alert("Tidak dapat menampilkan data!");
        //             }
        //         });
        //     }
    </script>
@endsection
@endcomponent
