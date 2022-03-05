    <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Diri
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('change')}}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Nama Anda</label>
                            <input name="name" value="{{Auth::user()->name}}" type="text" required class="form-control">
                        </div>
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label>Nama Anda</label>
                            <input name="no_handphone" value="{{Auth::user()->no_handphone}}" type="number" required
                                class="form-control">
                        </div>
                        @error('no_handphone')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <button type="submit" class="btn btn-outline-success btn-block"><i
                                class="fas fa-dolly-flatbed"></i> Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#staticBackdrop1"><i
            class="fas fa-credit-card"></i>
        Edit data diri
    </button> --}}
    <div class="row">
        <div class="col-md-6">
            <address>
                <strong>Payment Method:</strong><br>
                BCA<br>
            </address>
        </div>
        <div class="col-md-6 text-md-right">
            <address>
                <strong>Order Date:</strong><br>
                29 Maret 2022<br><br>
            </address>
        </div>
    </div>
