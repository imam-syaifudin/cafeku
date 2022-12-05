@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">Data User</h3>
            </div>
            <div class="col-md-12">
                <table class="table text-center">
                    <a href="{{ url('user/create') }}" class="btn btn-success">Add User</a>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($user as $kat)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $kat->name }}</td>
                                <td>{{ $kat->email }}</td>
                                <td>{{ $kat->role }}</td>
                                <td>
                                    <a href="{{ url('user/' . $kat->id . '/edit') }}"
                                        class="btn btn-outline-primary">Edit</a>
                                        <form action="{{ route('user.destroy',$kat->id) }}" method="POST" class="d-inline-block">
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
