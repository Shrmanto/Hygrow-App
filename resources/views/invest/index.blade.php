@component('layouts.app')

@section('content')
        <div class="col-md-12">
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
                            <th>Investation Name</th>
                            <th>Images</th>
                            <th>Price</th>
                            <th>Profit</th>
                            <th>Contract</th>
                            <th>Description</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>
<!-- @include('admin.form') -->
                @endsection

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
                "url" : "{{ route('invest.data') }}",
                "type" : "GET"
                    }
            });
            $('#modal-form form').on('submit', function(e){
                    if(!e.isDefaultPrevented()){
                        var id = $('#id').val();
                        if(save_method == "add") url = "{{ route('invest.store') }}";
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
                                alert("Tidak dapat menyimpan, data sudah ada!");
                            }
                        });
                        return false;
                    }
                });
        });
        function addForm(){
                save_method = "add";
                $('input[name=_method]').val('POST');
                $('#modal-form').modal('show');
                $('#modal-form form')[0].reset();
                $('.modal-title').text('Add Data');
            }
        function editForm(id){
                save_method = "edit";
                $('input[name=_method]').val('PATCH');
                $('#modal-form form')[0].reset();
                $.ajax({
                    url : "investations/"+id+"/edit",
                    type : "GET",
                    dataType : "JSON",
                    success : function(data){
                        $('#modal-form').modal('show');
                        $('.modal-title').text('Edit Data');

                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        $('#images').val(data.images);
                        $('#price').val(data.price);
                        $('#stock').val(data.stock);
                        $('#description').val(data.description);
                    },
                    error : function(){
                        alert("Tidak dapat menampilkan data!");
                    }
                });
            }
            function deleteData(id) {
                $.ajax({
                    url : "investations/"+id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
                    success : function(data) {
                        table.ajax.reload();
                    },
                    error : function () {
                        alert("Tidak dapat menampilkan data!");
                    }
                });
            }
    </script>
@endsection
@endcomponent
