<x-layout>
    @if (session('success'))
    <div class="alert alert-success position-fixed">
        <h6>{{ session('success') }}</h6>
    </div>
    <script>
      const alert = document.querySelector('.alert');
      setTimeout(() => {
        alert.style.display = 'none';
      }, 3000);
    </script>
@endif
    <div class="col-11 d-flex fw-bold mb-5 justify-content-between px-md-5 px-3 align-items-center mt-4 h3">
        <a href="{{ route('kelas.pilihkelas') }}" class="text-dark">
            <i class="fa-solid fa-arrow-left" style=""></i>
        </a>
        <label for="" class="justify-self-center ps-md-5 ms-md-5">Data Siswa Kelas {{ $nama }}</label>
        <span></span>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <div class="col-11">
            <div class="col-6 col-md-3 mt-3 ms-auto">
                <form action="" method="GET" class="input-group ">
                    <input type="text" placeholder="Search Student" name="search" class="rounded-start-3 ps-3 col-8">
                    <button class="btn rounded-none d-flex align-items-center gap-2 justify-content-center text-light col-4" style="background: #B68D40">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <label for="" class="d-none d-md-block">Search</label>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-4 d-flex justify-content-center">
        <div class="col-11">
            @if (!$bangku == 0 || $jsiswa == 0)
                <a href="{{ route('siswa.kelas',$id) }}" class="text-decoration-none btn btn-warning  mb-2">Masukkan Siswa</a>
            @endif
                <table class="table text-center table-striped table-hover border border-1 shadow overflow-x-scroll" style="max-height: 73vh">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->name }}</td>
                            <td class=" d-flex justify-content-center">
                                <button type="button" class="btn text-light ms-md-3 bg-danger d-md-flex align-items-center justify-content-center gap-3" data-bs-toggle="modal" data-bs-target="#deleteModal" data-nis="{{ $item->nis }}" data-id = '{{ $id }}'>
                                    <i class="fa-solid fa-trash"></i>
                                    <label for="" class="d-none d-md-block">Delete</label>
                                </button>
                                <!-- Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Peringatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center h6">Data yang anda pilih akan dihapus secara permanen</p>
                                        <p class="text-danger text-center h6">Anda yakin ingin menghapus data ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    <!-- Form delete dengan nis dinamis -->
                                    <form id="deleteForm" action="" method="post">
                                        @csrf
                                        <input type="hidden" name="id_kelas" id="kelas_id" value="">
                                        <input type="hidden" name="id" id="idToDelete" value="">
                                        <button type="submit" class="btn btn-danger">Hapus Dari Kelas</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div> 
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="h5">
                                <h5>No Data Found</h5>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
    </div>
    <script>
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            // Button yang memicu modal
            const button = event.relatedTarget;
            // Ambil data dari button (data-nis)
            const nis = button.getAttribute('data-nis');
            const id = button.getAttribute('data-id');
            // Update form action dan value nis di dalam modal
            const form = document.getElementById('deleteForm');
            const idInput = document.getElementById('idToDelete').value = nis;
            const kelas = document.getElementById('kelas_id').value = id;
                // console.log(idInput)
            // Set action URL sesuai id
            form.action = `/kelas/siswa/update/${nis}`;
        });
    </script>
</x-layout>