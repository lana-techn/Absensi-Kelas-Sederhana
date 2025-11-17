<x-layout>
    <div style="background: #F4EBD0; min-height: 91.8vh;">
        <div class="col-11 d-flex fw-bold py-5 justify-content-between px-md-5 px-3 align-items-center h3">
            <a href="{{ route('dashboard.tampil') }}" class="text-dark">
                <i class="fa-solid fa-arrow-left" style=""></i>
            </a>
            <label for="" class="justify-self-center ps-md-5 ms-md-5">Master Class</label>
            <span></span>
        </div>
        <div class="d-flex flex-wrap flex-column flex-xl-row gap-3 gap-xl-5 col-12 mt-5 align-items-center justify-content-center">
            <a href="{{ route('siswa.kelas.pilih') }}" class="col-11 text-decoration-none justify-content-start ps-4 ps-xl-0 h1 align-items-center col-xl-2 shadow text-xl-center text-right py-xl-5 rounded bg-warning d-flex flex-xl-column justify-xl-content-center align-items-center" style="height: fit-content">
                <i class="fa-solid col-2 col-xl-12 fa-user-plus mb-xl-3 py-3" ></i>
                <label for="" class="h5 col-10 text-end pe-4 pe-xl-0 text-xl-center col-xl-12">Tambah Siswa ke kelas</label>
            </a>
            <a href="{{ route('kelas.pilihkelas') }}" class="col-11 text-decoration-none justify-content-start ps-4 ps-xl-0 h1 align-items-center col-xl-2 shadow text-xl-center text-right py-xl-5 rounded bg-warning d-flex flex-xl-column justify-xl-content-center align-items-center" style="height: fit-content">
                <i class="fa-solid col-2 col-xl-12 fa-list mb-xl-3 py-3" ></i>
                <label for="" class="h5 col-10 text-end pe-4 pe-xl-0 text-xl-center col-xl-12">List Siswa dalam kelas</label>
            </a>
            <a href="{{ route('kelas.tampil') }}" class="col-11 text-decoration-none justify-content-start ps-4 ps-xl-0 h1 align-items-center col-xl-2 shadow text-xl-center text-right py-xl-5 rounded bg-warning d-flex flex-xl-column justify-xl-content-center align-items-center" style="height: fit-content">
                <i class="fa-solid col-2 col-xl-12 fa-chalkboard mb-xl-3 py-3" ></i>
                <label for="" class="h5 col-10 text-end pe-4 pe-xl-0 text-xl-center col-xl-12">List kelas</label>
            </a>
        </div>
    </div>
</x-layout>