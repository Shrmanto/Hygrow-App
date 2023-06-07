<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form method="POST" class="form-horizontal" data-toggle="validator">
                {{ csrf_field() }} {{ method_field('POST') }}
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Data Investation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <input type="hidden" id="id" name="id"/>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Name Investation</label>
                            <input type="text" id="name" name="name" class="form-control" autofocus required />
                        </div>
            </div> 
            <div class="row">
                        <div class="col mb-3">
                            <label for="email" class="form-label">Price</label>
                            <input type="email" id="email" name="email" class="form-control" required />
                        </div>
                    </div>
            <div class="row">
                        <div class="col mb-3">
                            <label for="address" class="form-label">Profit</label>
                            <input type="text" id="address" name="address" class="form-control" required />
                        </div>
            </div>
            <div class="row">
                        <div class="col mb-3">
                            <label for="phone_number" class="form-label">Contract</label>
                            <input type="number" id="phone_number" name="phone_number" class="form-control" required />
                        </div>
                    </div>
            <div class="row">
                        <div class="col mb-3">
                            <label for="password" class="form-label">Description</label>
                            <input type="password" id="password" name="password" class="form-control" required />
                        </div>
                    </div> 
            <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn mb-2 btn-primary">Save changes</button>
                </div>
            </div>
        </div>
</form>
        </div>
    </div>
</div>