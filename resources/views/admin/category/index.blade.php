@extends('admin.layouts.main')

@section('container')

<div class="content">
    <div class="title-table h1 text-center">Data Kategori</div>
    <div class="group-button my-3">
        <a href="{{ route('form.create.category') }}" class="btn btn-outline-primary">
            Tambah Data
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $index => $cg)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $cg->name }}</td>
                            <td>
                                <a href="{{ route('form.update.category', $cg->id) }}" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                                <a href="{{ route('delete.category', $cg->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
