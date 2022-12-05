@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">Edit Kategori</h3>
            </div>
            <div class="col-md-12">
                <form action="{{ route('kategori.update',$kategori->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama" value="{{ $kategori->nama }}" aria-describedby="emailHelp" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
