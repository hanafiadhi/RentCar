@extends('backend.full')
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Admin</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data admin</h4>
                    <a href="/fitur-mobil/create" class=" btn btn-outline-primary ml-auto">Tambah Admin</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Email</th>
                                <th>Status Email</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($admin as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email_verified_at}} </td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <div class="badge badge-success">Active</div>
                                </td>
                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
    </section>
</div @endsection
