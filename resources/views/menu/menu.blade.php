@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">Data Menu</h3>
            </div>
            <div class="col-md-12">
                <table class="table text-center">
                    <a href="{{ url('menu/create') }}" class="btn btn-success">Add Menu</a>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($menu as $kat)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $kat->nama }}</td>
                                <td><img src="{{ asset('storage/' . $kat->foto) }}" alt="" width="200" class="img-thumbnail shadow-lg"></td>
                                <td>Rp . {{ $kat->harga }}</td>
                                <td>{{ $kat->keterangan }}</td>
                                <td>{{ $kat->kategori->nama }}</td>
                                <td>
                                    <a href="{{ url('menu/' . $kat->id . '/edit') }}"
                                        class="btn btn-outline-primary">Edit</a>
                                        <form action="{{ route('menu.destroy',$kat->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
