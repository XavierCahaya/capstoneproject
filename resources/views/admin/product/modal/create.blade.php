<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('add.product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control"  required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id">Kategori</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($category as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Harga</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
