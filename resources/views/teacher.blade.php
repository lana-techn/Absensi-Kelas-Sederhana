<x-layout>
    <div style="background: #F4EBD0; min-height: 91.9vh;">
        <div id="carouselExample" class="carousel slide shadow" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ url('img/png/goes-to-japan.png') }}" class="d-md-none w-100" alt="First slide">
                    <img src="{{ url('img/png-dekstop/1.png') }}" class="d-md-block d-none w-100" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('img/png/teacher-training.png') }}" class="d-md-none w-100" alt="Second slide">
                    <img src="{{ url('img/png-dekstop/2.png') }}" class="d-md-block d-none w-100" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('img/png/talkshow.png') }}" class="d-md-none w-100" alt="Third slide">
                    <img src="{{ url('img/png-dekstop/3.png') }}" class="d-md-block d-none w-100" alt="Third slide">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Report Section -->
        
        <div style="background: #F4EBD0; min-height: 91.9vh;">
            @if ($dataPerKelas)
                <div class="container mt-5 d-flex justify-content-center">
                    <label for="" class="h2 text-center">Report Class for {{ date(" d F Y", strtotime($tanggal)) }}</label>
                </div>
                <!-- Form untuk memilih tanggal -->
                <div class="container mt-3 d-flex justify-content-center">
                    <form action="{{ route('dashboard.tampil') }}" method="GET" class="d-flex">
                        <input type="date" name="tanggal" value="{{ $tanggal }}" class="form-control">
                        <button type="submit" class="btn btn-primary ms-2">Filter</button>
                    </form>
                </div>
            @endif
            <!-- Cek jika jumlah data per kelas lebih dari 1 -->
            <div id="laporanslide" class="@if (count($dataPerKelas) > 1) carousel slide @endif" data-bs-ride="carousel">
                @if (count($dataPerKelas) > 1)
                    <div class="carousel-inner">
                        <div class="container mt-5">
                            <div class="col-12 d-flex overflow-x-scroll gap-5">
                                @forelse ($dataPerKelas as $kelasId => $data)
                                    <div class="carousel-item @if ($loop->first) active @endif"> <!-- Add 'active' class to the first item -->
                                        <div class="card mb-5 col-12">
                                            <div class="card-header d-flex justify-content-around">
                                                <h4 class="text-center">Kelas : {{ $kelas[$loop->iteration -1] }}</h4>
                                                <h4 class="text-center">tanggal : {{ date('d F Y' , strtotime($tanggal)) }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-12 d-flex flex-column flex-md-row mt-5">
                                                    <div class="col-12 col-md-8">
                                                        <h6 class="text-center">Weekly Attendance Report</h6>
                                                        <canvas id="lineChart{{ $kelasId }}"></canvas>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <h6 class="text-center">Daily Attendance Report</h6>
                                                        <canvas id="pieChart{{ $kelasId }}"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Script for Line and Pie Chart -->
                                    <script>
                                        let data{{ $kelasId }} = @json($data);

                                        // Pie Chart untuk harian
                                        let ctxPie{{ $kelasId }} = document.querySelector('#pieChart{{ $kelasId }}').getContext('2d');
                                        let pieChart{{ $kelasId }} = new Chart(ctxPie{{ $kelasId }}, {
                                            type: 'pie',
                                            data: {
                                                labels: ['Hadir', 'Izin', 'Sakit', 'Alpha'],
                                                datasets: [{
                                                    data: [data{{ $kelasId }}['Hadir'], data{{ $kelasId }}['Izin'], data{{ $kelasId }}['Sakit'], data{{ $kelasId }}['Alpha']],
                                                    backgroundColor: [
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 99, 132, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                            }
                                        });
                                    </script>
                                @empty
                                    <div class="col-12 bg-dark rounded py-5 d-flex align-items-center justify-content-center">
                                        <label for="" class="h5 text-light py-5 my-5">
                                            <h2 class="py-5 my-5">Tidak Ada Chart</h2> 
                                        </label>
                                    </div>
                                @endforelse
                                @foreach ($datamingguan as $kelasId=>$item)
                                <script>
                                    let datw{{ $kelasId }} = @json($item);
                                    // Line Chart untuk mingguan
                                    let ctxLine{{ $kelasId }} = document.querySelector('#lineChart{{ $kelasId }}').getContext('2d');
                                        let lineChart{{ $kelasId }} = new Chart(ctxLine{{ $kelasId }}, {
                                            type: 'bar',
                                            data: {
                                                labels: ['Hadir', 'Izin', 'Sakit', 'Alpha'],
                                                datasets: [
                                                    {
                                                        data: [datw{{ $kelasId }}['Hadir'], datw{{ $kelasId }}['Izin'], datw{{ $kelasId }}['Sakit'], datw{{ $kelasId }}['Alpha']],
                                                        backgroundColor: [
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 99, 132, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 99, 132, 1)'
                                                        ],
                                                        borderWidth: 1,
                                                        fill: true,
                                                    }
                                                ]
                                            },
                                            options: {
                                                responsive: true,
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                </script>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Navigasi carousel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#laporanslide" data-bs-slide="prev">
                        <span class="bg-dark p-4 carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#laporanslide" data-bs-slide="next">
                        <span class="bg-dark p-4 carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                @else
                    <!-- Jika hanya ada satu kelas, tampilkan laporan tanpa slider -->
                    <div class="container mt-5">
                        <div class="col-12">
                            @forelse ($dataPerKelas as $kelasId => $data)
                                <div class="card mb-5 col-12">
                                    <div class="card-header d-flex justify-content-around">
                                        <h4 class="text-center">Kelas : {{ $kelas[$loop->iteration -1] }}</h4>
                                        <h4 class="text-center">tanggal : {{ date('d F Y' , strtotime($tanggal)) }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-12 d-flex flex-column flex-md-row mt-5">
                                            <div class="col-12 col-md-8">
                                                <h6 class="text-center">Weekly Attendance Report</h6>
                                                <canvas id="lineChart{{ $kelasId }}"></canvas>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <h6 class="text-center">Daily Attendance Report</h6>
                                                <canvas id="pieChart{{ $kelasId }}"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Script for Line and Pie Chart -->
                                <script>
                                    let data{{ $kelasId }} = @json($data);
                                        // Pie Chart untuk harian
                                        let ctxPie{{ $kelasId }} = document.querySelector('#pieChart{{ $kelasId }}').getContext('2d');
                                        let pieChart{{ $kelasId }} = new Chart(ctxPie{{ $kelasId }}, {
                                            type: 'pie',
                                            data: {
                                                labels: ['Hadir', 'Izin', 'Sakit', 'Alpha'],
                                                datasets: [{
                                                    data: [data{{ $kelasId }}['Hadir'], data{{ $kelasId }}['Izin'], data{{ $kelasId }}['Sakit'], data{{ $kelasId }}['Alpha']],
                                                    backgroundColor: [
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 99, 132, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                            }
                                        });
                                </script>
                            @empty
                                <div class="container mt-3 d-flex justify-content-center">
                                    <form action="{{ route('dashboard.tampil') }}" method="GET" class="d-flex">
                                        <input type="date" name="tanggal" value="{{ $tanggal }}" class="form-control">
                                        <button type="submit" class="btn btn-primary ms-2">Filter</button>
                                    </form>
                                </div>
                                <div class="col-12 bg-dark rounded py-5 mt-5 d-flex align-items-center justify-content-center">
                                    <label for="" class="text-light py-5 my-5">
                                        <h2 class="py-5 my-5">Tidak Ada Data Absensi</h2> 
                                    </label>
                                </div>
                            @endforelse

                            @foreach ($datamingguan as $kelasId=>$item)
                                <script>
                                    let datw{{ $kelasId }} = @json($item);
                                    // Line Chart untuk mingguan
                                    let ctxLine{{ $kelasId }} = document.querySelector('#lineChart{{ $kelasId }}').getContext('2d');
                                        let lineChart{{ $kelasId }} = new Chart(ctxLine{{ $kelasId }}, {
                                            type: 'bar',
                                            data: {
                                                labels: ['Hadir', 'Izin', 'Sakit', 'Alpha'],
                                                datasets: [
                                                    {
                                                        data: [datw{{ $kelasId }}['Hadir'], datw{{ $kelasId }}['Izin'], datw{{ $kelasId }}['Sakit'], datw{{ $kelasId }}['Alpha']],
                                                        backgroundColor: [
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 99, 132, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 99, 132, 1)'
                                                        ],
                                                        borderWidth: 1,
                                                        fill: true,
                                                    }
                                                ]
                                            },
                                            options: {
                                                responsive: true,
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                </script>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <x-footer></x-footer>
        </div>
        
    </div>
    <!-- Bootstrap JS -->
</x-layout>