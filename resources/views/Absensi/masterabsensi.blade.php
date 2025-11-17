<x-layout>
    <div style="background: #F4EBD0; min-height: 91.8vh;">
        <div class="col-11 d-flex fw-bold py-5 justify-content-between px-md-5 px-3 align-items-center h3">
            <a href="{{ route('absensi.choose') }}" class="text-dark">
                <i class="fa-solid fa-arrow-left" style=""></i>
            </a>
            <label for="" class="justify-self-center ps-md-5 ms-md-5">Select Class</label>
            <span></span>
        </div>
        <div class="overflow-x-scroll" style="max-height: 70vh">
            <div class="d-flex flex-xl-wrap flex-column flex-xl-row gap-3 gap-xl-5 col-12 mt-5 align-items-center justify-content-center overflow-x-scroll" style="max-height: 73vh">
                @foreach ($data as $item)
                    @foreach ($item->pengajars as $newdata)
                        <a href="{{ route('absensi.kelas.siswa',$newdata->id) }}" class="text-decoration-none col-11 justify-content-start ps-4 ps-xl-0 h1 align-items-center col-xl-2 shadow text-xl-center text-right py-xl-5 rounded bg-warning d-flex flex-xl-column justify-xl-content-center align-items-center" style="height: fit-content">
                            <i class="fa-solid col-2 col-xl-12 fa-chalkboard mb-xl-3 py-3" ></i>
                            <label for="" class="h5 col-10 text-end pe-4 pe-xl-0 text-xl-center col-xl-12">{{ $newdata->name }}</label>
                        </a>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</x-layout>