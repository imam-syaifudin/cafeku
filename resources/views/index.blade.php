@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">Data Menu</h3>
            </div>
            @foreach( $menu as $m )
            <div class="col-md-4 d-flex-justify-content-center mt-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/'. $m->foto ) }}" class="card-img-top" alt="..." style="height: 200px;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $m->nama }}</h5>
                      <p class="card-text">{{ Str::limit($m->keterangan , 90) }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Harga Rp . {{ $m->harga }}</li>
                    </ul>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
