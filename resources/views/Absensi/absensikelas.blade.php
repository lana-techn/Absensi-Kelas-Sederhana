<x-layout>
    @if (Session::has('success'))
            <div class="alert alert-success position-fixed">
                <h6>{{ Session::get('success') }}</h6>
            </div>
            <script>
            const alert = document.querySelector('.alert');
            setTimeout(() => {
                alert.style.display = 'none';
            }, 3000);
            </script>
    @endif
    <div class="col-11 d-flex fw-bold py-5 justify-content-between px-md-5 px-3 align-items-center h3">
        <a href="{{ route('absensi.kelas') }}" class="text-dark">
            <i class="fa-solid fa-arrow-left" style=""></i>
        </a>
        <label for="" class="justify-self-center ps-md-5 ms-md-5">Absensi {{ $kelas->name }}</label>
        <span></span>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <div class="col-11">
            <div class="col-6 col-md-3 mt-3 ms-auto">
                <form action="{{ route('absensi.kelas.siswa',$kelas->id) }}" method="GET" class="input-group ">
                    @csrf
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
            @if (!$kelas->bangku_tersisa == 0 || $exc < 1)
                <a href="{{ route('kelas.siswa',$kelas->id) }}" class="text-decoration-none btn btn-secondary mb-5">Masukkan Siswa</a>
            @endif  
            <a href="{{ route('kehadiran.edit',$kelas->id) }}" class="text-decoration-none btn btn-primary mb-5">Lihat Data Kehadiran</a>
                <table class="table text-center table-striped table-hover border border-1 shadow">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if ($exc >=1)
                            @forelse ($siswa as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->name }}</td>

                                    <td class="d-flex justify-content-center gap-2 gap-md-4">
                                        <form action="{{ route('absensi.add') }}" method="post">
                                            @csrf
                                            <input type="hidden" name='siswa_id' value='{{ $item->id }}'>
                                            <input type="hidden" name='kelas' value='{{ $kelas->id }}'>
                                            <input type="hidden" name='status' value='Hadir'>
                                            <button class="btn btn-success">Hadir</button>
                                        </form>
                                        <form action="{{ route('absensi.add') }}" method="post">
                                            @csrf
                                            <input type="hidden" name='siswa_id' value='{{ $item->id }}'>
                                            <input type="hidden" name='kelas' value='{{ $kelas->id }}'>
                                            <input type="hidden" name='status' value='Sakit'>
                                            <button class="btn btn-warning">Sakit</button>
                                        </form>
                                        <form action="{{ route('absensi.add') }}" method="post">
                                            @csrf
                                            <input type="hidden" name='siswa_id' value='{{ $item->id }}'> 
                                            <input type="hidden" name='kelas' value='{{ $kelas->id }}'>
                                            <input type="hidden" name='status' value='Izin'>
                                            <button class="btn btn-primary">Izin</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan='10' class='h5'>Semua siswa sudah absen</td>
                            </tr>
                            @endforelse
                        @else
                            <tr>
                                <td colspan='10' class='h5'>Belum ada Data Siswa</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
    </div>
</x-layout>