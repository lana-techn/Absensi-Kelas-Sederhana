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
    {{-- {{ dd($siswa) }}    --}}
    <div class="col-11 d-flex fw-bold py-5 justify-content-between px-md-5 px-3 align-items-center h3">
        <a href="{{ route('absensi.kelas') }}" class="text-dark">
            <i class="fa-solid fa-arrow-left" style=""></i>
        </a>
        <label for="" class="justify-self-center ps-md-5 ms-md-5">Kehadiran</label>
        <span></span>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <div class="col-11">
            <div class="col-6 col-md-3 mt-3 ms-auto">
                <form action="{{ route('kehadiran.edit',$kelas->id) }}" method="GET" class="input-group ">
                    <input type="text" placeholder="Search Student" name="search" class="rounded-start-3 ps-3 col-8">
                    <button class="btn rounded-none d-flex align-items-center gap-2 justify-content-center text-light col-4" style="background: #B68D40">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <label for="" class="d-none d-md-block">Search</label>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-4 d-flex justify-content-center ms-1">
        <div class="col-11 ">
            @if (!$kelas->bangku_tersisa == 0)
                <a href="{{ route('kelas.siswa',$kelas->id) }}" class="text-decoration-none btn btn-warning  mb-5">Masukkan Siswa</a>
            @endif
            <div class="col-12 d-flex justify-content-between">
                <a href="{{ route('absensi.kelas.siswa',$kelas->id) }}" class="text-decoration-none btn btn-primary mb-5">Absen Siswa</a>
                <div class="col-6 col-md-3">
                    <form action="{{ route('kehadiran.edit',$kelas->id) }}" class="d-flex input-group">
                        <input type="date" name='date' class="form-control w-75" value="{{ now()->format('dd/MM/YYY') }}">
                        <button class="w-25 btn btn-primary form-control">
                            <i class="fa-solid fa-magnifying-glass d-lg-none"></i>
                            <label for="" class="d-none d-lg-block">Search</label>
                        </button>
                    </form>

                </div>
            </div>
                <table class="table text-center me-2 table-striped table-hover border border-1 shadow">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->siswa->nis }}</td>
                                <td>{{ $item->siswa->name }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->status }}</td>

                                <td class="justify-content-center flex-column flex-md-row gap-2 gap-md-4 px-0 py-2 " style="display: none;" id="btn_change_{{ $loop->index }}">
                                    <form action="{{ route('absensi.edit',$item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name='siswa_id' value='{{ $item->id }}'>
                                        <input type="hidden" name='kelas' value='{{ $kelas->id }}'>
                                        <input type="hidden" name='status' value='Hadir'>
                                        <button class="btn btn-success">Hadir</button>
                                    </form>
                                    <form action="{{ route('absensi.edit',$item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name='siswa_id' value='{{ $item->id }}'>
                                        <input type="hidden" name='kelas' value='{{ $kelas->id }}'>
                                        <input type="hidden" name='status' value='Sakit'>
                                        <button class="btn btn-warning">Sakit</button>
                                    </form>
                                    <form action="{{ route('absensi.edit',$item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name='siswa_id' value='{{ $item->id }}'> 
                                        <input type="hidden" name='kelas' value='{{ $kelas->id }}'>
                                        <input type="hidden" name='status' value='Izin'>
                                        <button class="btn btn-primary">Izin</button>
                                    </form>
                                    <a href="{{ route('kehadiran.edit',$item->kelas->id ) }}" class="btn btn-danger text-decoration-none" >Batal</a>
                                </td>
                                <td id="btn_edit_{{ $loop->index }}" class="px-0 py-2">
                                    <button class="btn btn-warning btn_edit" >Edit</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='10' class='h5'>
                                    Siswa Belum Absen
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
    </div>
    <script src="{{ url('js/showbtnabsensi.js') }}"></script>
</x-layout>