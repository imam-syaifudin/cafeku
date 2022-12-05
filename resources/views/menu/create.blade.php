@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">Add Menu</h3>
            </div>
            <div class="col-md-12">
                <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="foto"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="harga"
                            aria-describedby="emailHelp" required>
                    </div>
                    <select class="form-select mb-3" aria-label="Default select example" name="kategori_id">
                        <option selected>Kategori</option>
                        @foreach ($kategori as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                        @endforeach
                    </select>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="keterangan"
                            style="height: 280px;"></textarea>
                        <label for="floatingTextarea">Keterangan</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
