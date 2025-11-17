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
        @if (session('error'))
            <div class="alert alert-danger position-fixed">
                <h6>{{ session('error') }}</h6>
            </div>
            <script>
              const alert = document.querySelector('.alert');
              setTimeout(() => {
                alert.style.display = 'none';
              }, 3000);
            </script>
        @endif
        <div class="col-11 d-flex fw-bold mb-5 justify-content-between px-md-5 px-3 align-items-center mt-4 h3">
            <a href="{{ route('siswa.kelas.pilih') }}" class="text-dark">
                <i class="fa-solid fa-arrow-left" style=""></i>
            </a>
            <label for="" class="justify-self-center ps-md-5 ms-md-5">Add Student To The Class</label>
            <span></span>
        </div>
    <div class="col-12 d-flex justify-content-center">
        <div class="col-11">
            <div class="col-6 col-md-3 mt-3 ms-auto">
                <form action="{{ route('siswa.kelas',$id) }}" class="input-group ">
                    <input type="text" name='search' placeholder="Search Student" class="rounded-start-3 ps-3 col-8">
                    <button class="btn rounded-none d-flex align-items-center gap-2 justify-content-center text-light col-4" style="background: #B68D40">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <label for="" class="d-none d-md-block">Search</label>
                    </button>
                </form>
            </div>
            @if ($bangkuTersisa > 0)
                <div class="col-11">
                    <label for="" class="h6 p-3 bg-primary text-light rounded">
                        Jumlah Bangku Tersisa untuk kelas {{ $kelas->name }} : <span id="bangkusisa">{{ $bangkuTersisa }}</span> / {{ $kelas->rombel }}
                     </label> 
                </div>
            @endif
        </div>
    </div>
    <div class="mt-4 d-flex justify-content-center">
        <div class="col-11">
            @if ( $bangkuTersisa > 0)
                <form id="studentForm" action="{{ route('siswa.kelas.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name='bangku_tersisa' id="bangkuTersisa" value="{{ $bangkuTersisa }}">
                    <div class="overflow-y-scroll" style="max-height: 50vh">
                        <table class="table text-center table-striped table-hover border border-1 shadow">
                            <thead class="top-0 position-sticky">
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
                                    <td>
                                        <input type="hidden" name="jumlah_siswa" value="1">
                                        <input type="hidden" name="id_kelas" value="{{ $id }}">
                                        <input type="checkbox" disable name="students[]" value="{{ $item->nis }}" class="form-check-input">
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="h5">
                                        No Data Found
                                    </td>
                                    <a href="/" class="btn btn-primary mb-2 w-100">Kembali Ke beranda</a>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="w-100 mt-5 d-md-none d-flex justify-content-center ">
                        <button class="add_all btn btn-primary" id="submitStudents" style="display: none">Tambah siswa ke kelas</button>
                    </div>
                    <div class="w-100 mt-5 d-sm-flex d-none justify-content-center ">
                        <button class="add_all btn btn-primary" id="submitStudents" style="display: none">Tambah siswa ke kelas</button>
                    </div>
                </form>
            @else
            <div class="bg-dark col-12 mt-5 rounded d-flex flex-column gap-5 p-5 text-light justify-content-center align-items-center">
                <h2>Semua Bangku Sudah Terisi</h2>
                <div class="d-flex gap-2">
                    <a href='{{ route('siswa.kelas.pilih') }}' class="btn btn-primary rounded">Pilih Kelas lain</a>
                    <a href='{{ route('absensi.kelas.siswa',$id) }}' class="btn btn-warning rounded">Absen Siswa</a>
                    <a href='{{ route('kelas.siswa',$id) }}' class="btn btn-secondary rounded">Lihat data siswa kelas {{ $kelas->name }}</a>
                </div>
            </div>
            @endif
        </div>
    </div>
    
    </script><script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.all.min.js
    "></script>
    <script>
    // Ambil semua row yang ada di dalam tabel
        document.querySelectorAll('tr').forEach(function(row) {
            // Tambahkan event listener untuk setiap row
            row.addEventListener('click', function(event) {
                // Jika elemen yang di-klik adalah checkbox, kita harus menghindari penggandaan aksi
                if (event.target.tagName.toLowerCase() === 'input') return;
        
                // Cari checkbox yang ada di dalam row tersebut
                const checkbox = row.querySelector('input[type="checkbox"]');
                const bsisa = document.getElementById('bangkusisa'); // Ambil elemen bangkusisa
                
                // Jika checkbox ditemukan, ubah status checked
                if (checkbox && !checkbox.disabled) { // Hanya jika checkbox tidak disabled
                    // Simpan nilai bangku sisa sebelum mengubah status checkbox
                    let bangkuSisaValue = parseInt(bsisa.textContent);
        
                    // Ubah status checkbox
                    const isChecked = !checkbox.checked; // Status baru checkbox
        
                    // Ubah nilai bangkusisa berdasarkan status checkbox
                    if (isChecked) { // Jika checkbox akan dicentang
                        if (bangkuSisaValue > 0) { // Cek jika bangku tersisa masih lebih dari 0
                            bsisa.textContent = bangkuSisaValue - 1; // Kurangi 1 dari bangku tersisa
                        } else {
                            return; // Jika bangku sisa 0, hentikan aksi
                        }
                    } else { // Jika checkbox akan dihapus centangnya
                        bsisa.textContent = bangkuSisaValue + 1; // Tambahkan 1 ke bangku tersisa
                    }
        
                    // Set status checked checkbox
                    checkbox.checked = isChecked;
        
                    let checkboxes = document.querySelectorAll('input[type=checkbox]');
                    let addallButtons = document.querySelectorAll('.add_all'); 
                    let isAnyChecked = Array.from(checkboxes).some(cb => cb.checked);
        
                    // Tampilkan tombol "Tambah siswa ke kelas" jika ada checkbox yang dicentang
                    addallButtons.forEach(function(button) {
                        button.style.display = isAnyChecked ? 'block' : 'none';
                    });
        
                    console.log(bsisa.textContent);
        
                    // Nonaktifkan checkbox yang belum dicentang jika bangku tersisa 0
                    if (parseInt(bsisa.textContent) === 0) {
                        checkboxes.forEach(function(cb) {
                            if (!cb.checked) {
                                cb.disabled = true; // Nonaktifkan checkbox yang belum dicentang
                            }
                        });
                        Swal.fire({
                            title: "Peringatan!",
                            text: "Jumlah Siswa yang anda pilih sudah Mencapai batas",
                            icon: "warning"
                        });
                        
                    } else {
                        // Aktifkan kembali checkbox jika ada bangku tersisa
                        checkboxes.forEach(function(cb) {
                            if (!cb.checked) {
                                cb.disabled = false; // Aktifkan checkbox jika bangku tersisa ada
                            }
                        });
                    }
                }
            });
        
            // Tambahkan event listener ke checkbox untuk memastikan klik checkbox berfungsi juga
            const checkbox = row.querySelector('input[type="checkbox"]');
            if (checkbox) {
                checkbox.addEventListener('click', function(event) {
                    event.stopPropagation(); // Hindari penggandaan aksi karena checkbox berada di dalam row
                    
                    const bsisa = document.getElementById('bangkusisa');
                    let bangkuSisaValue = parseInt(bsisa.textContent);
        
                    if (checkbox.checked) { // Checkbox sedang dicentang
                        if (bangkuSisaValue > 0) {
                            bsisa.textContent = bangkuSisaValue - 1; // Kurangi bangku sisa
                        } else {
                            checkbox.checked = false; // Jika bangku habis, batalkan centang
                            return;
                        }
                    } else { // Checkbox dihapus centangnya
                        bsisa.textContent = bangkuSisaValue + 1; // Tambah bangku sisa
                    }
        
                    let checkboxes = document.querySelectorAll('input[type=checkbox]');
                    let addallButtons = document.querySelectorAll('.add_all'); 
                    let isAnyChecked = Array.from(checkboxes).some(cb => cb.checked);
        
                    // Tampilkan tombol "Tambah siswa ke kelas" jika ada checkbox yang dicentang
                    addallButtons.forEach(function(button) {
                        button.style.display = isAnyChecked ? 'block' : 'none';
                    });
        
                    // Nonaktifkan checkbox yang belum dicentang jika bangku tersisa 0
                    if (parseInt(bsisa.textContent) === 0) {
                        checkboxes.forEach(function(cb) {
                            if (!cb.checked) {
                                cb.disabled = true; // Nonaktifkan checkbox yang belum dicentang
                            }
                        });
                        Swal.fire({
                            title: "Peringatan!",
                            text: "Jumlah Siswa yang anda pilih sudah Mencapai batas",
                            icon: "warning"
                        });
                    } else {
                        // Aktifkan kembali checkbox jika ada bangku tersisa
                        checkboxes.forEach(function(cb) {
                            if (!cb.checked) {
                                cb.disabled = false; // Aktifkan checkbox jika bangku tersisa ada
                            }
                        });
                    }
                });
            }
        });
        



    </script>
</x-layout>
