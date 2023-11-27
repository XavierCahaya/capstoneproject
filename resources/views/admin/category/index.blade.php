@extends('admin.layouts.main')

@section('container')

<div class="content row justify-content-center">
    <div class="col-lg-9">
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
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Nama</th>
                            <th class="text-center align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $index => $cg)
                            <tr>
                                <td class="text-center align-middle">{{ $index + 1 }}</td>
                                <td class="text-center align-middle">{{ $cg->name }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('form.update.category', $cg->id) }}" class="btn btn-sm btn-success m-1">
                                        Edit
                                    </a>
                                    <a href="{{ route('delete.category', $cg->id) }}" class="btn btn-sm btn-danger m-1" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
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
</div>

@endsection
