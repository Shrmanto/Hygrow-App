@component('layouts.app')

    @section('content')
        <div class="col-md-12">
            <button type="button" onclick="addForm()" class="btn mb-2 btn-outline-success"><i
                    class="fas fa-user-plus"></i></button>
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
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('partners.form')
    @endsection

    @section('script')
        <script type="text/javascript">
            var table, save_method;
            $(function() {
                table = $('#table').DataTable({
                    "processing": true,
                    'responsive': true,
                    'scrollY': true,
                    'autoWidth': true,
                    "ajax": {
                        "url": "{{ route('partner.data') }}",
                        "type": "GET"
                    }
                });
                $('#modal-form form').on('submit', function(e) {
                    if (!e.isDefaultPrevented()) {
                        var id = $('#id').val();
                        if (save_method == "add") url = "{{ route('partners.store') }}";
                        else url = "partners/" + id;
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: $('#modal-form form').serialize(),
                            success: function(data) {
                                $('#modal-form').modal('hide');
                                table.ajax.reload();
                            },
                            error: function() {
                                alert("Tidak dapat menyimpan data!");
                            }
                        });
                        return false;
                    }
                });
            });

            function addForm() {
                save_method = "add";
                $('input[name=_method]').val('POST');
                $('#modal-form').modal('show');
                $('#modal-form form')[0].reset();
                $('.modal-title').text('Add Data Partner');
            }

            function deleteData(id) {
                $.ajax({
                    url: "partners/" + id,
                    type: "POST",
                    data: {
                        '_method': 'DELETE',
                        '_token': $('meta[name=csrf-token]').attr('content')
                    },
                    success: function(data) {
                        table.ajax.reload();
                    },
                    error: function() {
                        alert("Tidak dapat menghapus data!");
                    }
                });
            }
        </script>
    @endsection
@endcomponent
