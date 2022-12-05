@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">Add User</h3>
            </div>
            <div class="col-md-12">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password"
                            aria-describedby="emailHelp" required>
                    </div>
                    <select class="form-select mb-3" aria-label="Default select example" name="role">
                        <option selected>Role</option>
                            <option value="admin">Admin</option>
                            <option value="owner">Owner</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
