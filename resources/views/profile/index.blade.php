@component('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-lg-12 mb-3">
                <a href="javascript:void(0)" class="btn btn-warning" onclick="editProfile()"><i class="fas fa-pencil-alt"></i> Ubah Data</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col mb-3">
                                <h6 class="card-title"><b>Nama</b></h6>
                                <p class="card-text" id="dataName">{{ $user->name }}</p>
                            </div>
                            <div class="col mb-3">
                                <h6 class="card-text"><b>Email</b></h6>
                                <p class="card-text" id="dataEmail">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col">
                                <h6 class="card-text"><b>Terdaftar</b></h6>
                                <p class="card-text">{{ $user->created_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('profile.form')
    @endsection

    @section('script')
        <script type="text/javascript">
            var table, save_method;
            $(function() {
                $('#modal-form form').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "{{ route('user.update', $user->id) }}" ,
                        type: "POST",
                        data: $('#modal-form form').serialize(),
                        success: function(data) {
                            if(data.success == true){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Profile berhasil di edit!',
                                })
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: "Berhasil update profile!",
                                    icon: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK'
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                                $('#modal-form').modal('hide');
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Tidak dapat update profile!',
                                })
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Terjadi kesalahan dalam update profile!',
                            })
                        }
                    });
                });
            });

            function editProfile() {
                $('#old_password').on('keyup', function(){
                    if($(this).val() != ""){
                        $('#password').attr('required', true);
                        $('#confirm_password').attr('required', true);
                    }else{
                        $('#password').attr('required', false);
                        $('#confirm_password').attr('required', false);
                    }
                });

                save_method = "edit";
                $('input[name=_method]').val('PATCH');
                $('#modal-form form')[0].reset();
                $.ajax({
                    url : "profile/"+id+"/edit",
                    type : "GET",
                    dataType : "JSON",
                    success : function(data){
                        $('#modal-form').modal('show');
                        $('.modal-title').text('Edit Profile');

                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        $('#email').val(data.email);
                    },
                    error : function(){
                        alert("Tidak dapat menampilkan data!");
                    }
                });
            }
        </script>
    @endsection
@endcomponent