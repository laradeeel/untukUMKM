<div class="modal fade" id="hapusKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Kategori baru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <table class="table border border-black">
            <thead>
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>

                @php
                    $no = 1;
                @endphp
                @foreach ($menu_category as $data)
                <tr>
                    <th scope="row" class="text-center align-middle">{{ $no }}</th>
                    <td class="align-middle">{{ $data->nama_category }}</td>
                    <td>
                        <a href="/hapus-category/{{ $data->slug }}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?');">Hapus</a>
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
            </tbody>
          </table>

        </div>
    </div>
</div>