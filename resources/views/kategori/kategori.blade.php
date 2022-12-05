@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">Data Kategori</h3>
            </div>
            <div class="col-md-12">
                <table class="table text-center">
                    <a href="{{ url('kategori/create') }}" class="btn btn-success">Add Kategori</a>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($kategori as $kat)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $kat->nama }}</td>
                                <td>
                                    <a href="{{ url('kategori/' . $kat->id . '/edit') }}"
                                        class="btn btn-outline-primary">Edit</a>
                                        <form action="{{ route('kategori.destroy',$kat->id) }}" method="POST" class="d-inline-block">
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
