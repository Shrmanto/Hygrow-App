@component('layouts.app')

@section('content')
        <div class="col-md-12">
            <button type="button" onclick="addForm()" class="btn mb-2 btn-outline-success"><span class="fe fe-upload-cloud fe-16"></span></button>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>
@include('admin.form')
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
                "url" : "{{ route('customer.data') }}",
                "type" : "GET"
                    }
            });
            $('#modal-form form').on('submit', function(e){
                    if(!e.isDefaultPrevented()){
                        var id = $('#id').val();
                        if(save_method == "add") url = "{{ route('customer.store') }}";
                        else url = "customer/"+id;

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
                    url : "customer/"+id+"/edit",
                    type : "GET",
                    dataType : "JSON",
                    success : function(data){
                        $('#modal-form').modal('show');
                        $('.modal-title').text('Edit Data');

                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        $('#email').val(data.email);
                        $('#address').val(data.address);
                        $('#phone_number').val(data.phone_number);
                    },
                    error : function(){
                        alert("Tidak dapat menampilkan data!");
                    }
                });
            }
            function deleteData(id) {
                $.ajax({
                    url : "customer/"+id,
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
