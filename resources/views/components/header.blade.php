<header class="col-12 w-100 ps-3 ps-md-5 d-flex align-items-center text-light sticky-top" style="height: 60px; background: #914110;">
    <img src="{{ url('img\title.png') }}" alt="" class="col-5 col-md-3" style="cursor: pointer;" onclick="window.location.href='/'">
      <button class="btn me-3 me-md-5 ms-auto text-light" type="button" style="background: #122620" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars"></i>
      </button>
      
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <img src="{{ url('img\logo-title-phone.png') }}" class="w-50" alt="">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="mt-2 mt-md-5">
                <div class="col-12 d-flex justify-content-center gap-sm-3 gap-1 flex-column">
                    <a class="text-decoration-none" href="/">
                        <div class="shadow light text-light border rounded py-1 py-md-3 d-flex align-items-center justify-content-start col-12 px-5" style="cursor: pointer; background: #532200;" onclick="window.location.href = '/'">
                            <i class="fa-solid fa-home"></i>
                            <label for="" class="fs-6 ms-3 fs-sm-5 fs-md-4 fs-lg-3 me-2" style="cursor: pointer;">Home</label>
                        </div>
                    </a>
                    <a class="text-decoration-none" href="{{ route('siswa.tampil') }}">
                        <div class="shadow light text-light border rounded py-1 py-md-3 d-flex align-items-center justify-content-start col-12 px-5" style="cursor: pointer; background: #532200;">
                            <i class="fa-solid fa-user"></i>
                            <label for="" class="fs-6 ms-3 fs-sm-5 fs-md-4 fs-lg-3 me-2" style="cursor: pointer;">Student</label>
                        </div>
                    </a>
                    <a class="text-decoration-none" href="{{ route('master.class') }}">
                        <div class="shadow light text-light border rounded py-1 py-md-3 d-flex align-items-center justify-content-start col-12 px-5" style="cursor: pointer; background: #532200;" onclick="window.location.href = '{{ route('master.class') }}'">
                            <i class="fa-solid fa-chalkboard"></i>
                            <label for="" class="fs-6 ms-3 fs-sm-5 fs-md-4 fs-lg-3 me-2" style="cursor: pointer;">Class</label>
                        </div>
                    </a>
                    <a class="text-decoration-none" href="{{ route('absensi.choose') }}">
                        <div class="shadow light text-light border rounded py-1 py-md-3 d-flex align-items-center justify-content-start col-12 px-5" style="cursor: pointer; background: #532200;">
                            <i class="fa-solid fa-book"></i>
                            <label for="" class="fs-6 ms-3 fs-sm-5 fs-md-4 fs-lg-3 me-2" style="cursor: pointer;">Attendance</label>
                        </div>
                    </a>
                    <a class="text-decoration-none" href="{{ route('guru.main') }}">
                        <div class="shadow light text-light border rounded py-1 py-md-3 d-flex align-items-center justify-content-start col-12 px-5" style="cursor: pointer; background: #532200;">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            <label for="" class="fs-6 ms-3 fs-sm-5 fs-md-4 fs-lg-3 me-2" style="cursor: pointer;">Assign Class</label>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ route('log.out') }}" method="Post">
            @csrf
            <button class=" btn btn-light text-danger fw-bold h2 py-1 mb-5 py-md-3 justify-content-center d-flex align-items-center col-5 ms-4" style="cursor: pointer;">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <label for="" class="fs-6 ms-3 fs-sm-5 fs-md-4 fs-lg-3 me-2" style="cursor: pointer;">Log Out</label>
            </button>
        </form>
</header>