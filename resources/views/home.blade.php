@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order</div>

                <div class="card-body">
                    <form action="{{ route('home.order') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="nama">
                          </div>
                          <button type="submit" class="btn btn-success">Order</button>
                    </form>
                    @isset($data)
                    <ul class="list-group mt-3">
                        <li class="list-group-item active" aria-current="true">Order</li>
                        <li class="list-group-item">Nama : {{ $data['nama'] }}</li>
                        <li class="list-group-item">Jumlah Pesanan : {{ $data['jumlah_pesanan'] }} Pcs</li>
                        <li class="list-group-item">Total Pesanan : Rp . {{ $data['total_pesanan'] }}</li>
                        <li class="list-group-item">Status : {{ $data['status'] }}</li>
                        <li class="list-group-item">Diskon : {{ $data['diskon'] }}</li>
                        <li class="list-group-item">Total Pembayaran : Rp . {{ $data['total_pembayaran'] }}</li>
                      </ul>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
