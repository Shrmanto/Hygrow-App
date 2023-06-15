@extends('mitraMain.landing')
@section('content')
<form method="POST" class="form-horizontal" action="{{route('investm.update', $getDetailInvest->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')

    <input type="hidden" id="id" name="id" value="{{$getDetailInvest->id}}"/>
    <input type="hidden" id="customer_partner_id" name="customer_partner_id" value="{{Auth::user()->id}}"/>
            <div class="row">
                <div class="col mb-3">
                    <label for="name" class="form-label">Invest Name</label>
                    <input type="text" id="invest_name" name="invest_name" value="{{$getDetailInvest->invest_name}}" class="form-control" autofocus required />
                </div>
    </div> 
    <div class="row">
                <div class="col mb-3">
                    <label for="email" class="form-label">Price</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{$getDetailInvest->price}}" required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="email" class="form-label">Images</label>
                    <input type="file" id="images" name="images" class="form-control" required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="text" id="stock" name="stock" value="{{$getDetailInvest->stock}}" class="form-control" required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="stock" class="form-label">Profit</label>
                    <input type="text" id="profit" name="profit" value="{{$getDetailInvest->stock}}" class="form-control" required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="stock" class="form-label">Contract</label>
                    <input type="text" id="contract" name="contract" value="{{$getDetailInvest->stock}}" class="form-control" required />
                </div>
            </div>
    <div class="row">
                <div class="col mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" id="description" value="{{$getDetailInvest->description}}" name="description" class="form-control" required />
                </div>
    </div>
    <div class="modal-footer">
            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn mb-2 btn-primary">Save changes</button>
        </div>
    </div>
</div>
</form>
@endsection 
