<x-layout>
        <div style="background: #F4EBD0; min-height: 91.8vh;">
            <div class="col-11 d-flex fw-bold py-5 justify-content-between px-md-5 px-3 align-items-center h3">
                <a href="{{ route('master.class') }}" class="text-dark">
                    <i class="fa-solid fa-arrow-left" style=""></i>
                </a>
                <label for="" class="justify-self-center ps-md-5 ms-md-5">Input Student To The Class</label>
                <span></span>
            </div>
            {{-- {{ dd($data) }} --}}
            <div class="col-12 d-flex flex-wrap z-1 justify-content-center gap-md-5 p-md-5 overflow-y-scroll" id="boxcheck" style="min-height: 60vh; max-height: 73vh; ">
                @forelse ($data as $kls)
                    <a href="{{ route('siswa.kelas', $kls->id) }}" class="text-decoration-none col-11 justify-content-start ps-4 ps-xl-0 h1 align-items-center col-xl-2 shadow text-xl-center text-right py-xl-5 rounded bg-warning d-flex flex-xl-column justify-xl-content-center align-items-center" style="height: fit-content">
                        <i class="fa-solid col-2 col-xl-12 fa-chalkboard mb-xl-3 py-3" ></i>
                        <label for="" class="h5 col-10 text-end pe-4 pe-xl-0 text-xl-center col-xl-12">{{ $kls->name }}</label>
                        <label for="" class="h5 col-10 text-end pe-4 pe-xl-0 text-xl-center col-xl-12">Bangku Tersedia : {{ abs($kls->bangku_tersisa) }}/{{ abs($kls->rombel) }}</label>
                    </a>
                @empty
                    <label for="" class="h5 col-10 text-end pe-4 pe-xl-0 text-xl-center col-xl-12">Kelas Tidak Ditemukan</label>
                @endforelse
            </div>
        </div>
</x-layout>