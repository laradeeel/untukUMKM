<div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Kategori baru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="tambah-category" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Kategori:</label>
                    <input type="text" class="form-control border border-black @error('nama') is-invalid @enderror" id="recipient-name" name="nama_category" required autocomplete="off">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Tambah Kategori</button>
            </div>
        </form>

        </div>
    </div>
</div>