<?php

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pengajar;
use App\Models\Logkehadiran;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SclassController;
use App\Http\Controllers\PengajarController;


//RUTE LOGIN
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login.tampil');
    Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'tampilDashboard'])->name('dashboard.tampil');
    Route::post('/logout', [AuthController::class, 'logout'])->name('log.out');

    // siswa show
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.tampil');
    
    //siswa redirect to add 
    Route::get('/siswa/add', function(){
        return view('siswa.formadd');
    })->name('student.create');
    
    //siswa add
    Route::post('/siswa/add/new', [SiswaController::class, 'store'])->name('siswa.add');
    
    //siswa redirect to edit
    Route::get('/siswa/edit/{siswa:nis}', function(Siswa $siswa,Kelas $kelas){
        return view('siswa.edit',['nis' => $siswa->nis,'nama'=>$siswa->name,'kelas'=>$kelas->all()]);
    });
    
    //siswa edit
    Route::get('/siswa/edit/new/{nis}', [SiswaController::class, 'update'])->name('siswa.update');
    
    //siswa destroy
    Route::get('/siswa/delete/{nis}', [SiswaController::class, 'destroy'])->name('siswa.delete');
    
    //master class
    Route::get('/mclass', function(){
        return view('kelas.masterclass');
    })->name('master.class');

    //kelas show
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.tampil');
    
    //kelas redirect to add
    Route::get('/kelas/add', function(){
        return view('kelas.addkelas');
    })->name('kelas.create');

    //show list siswa di kelas
    Route::get('/kelas/siswa/{kelas:id}', [KelasController::class,'menuKelas'])->name('kelas.siswa');

    //show list kelas untuk show list siswa
    Route::get('/kelas/mskelas', function(){
        $siswaId = Pengajar::with(['kelas','guru'])->where('guru_id',Auth::user()->id)->pluck('kelas_id')->toArray();
        $kelas = Kelas::all()->whereIn('id',$siswaId);
        return view('kelas.pilihkelassiswa',['data'=>$kelas]);
    })->name('kelas.pilihkelas');

    //show list kelas untuk memasukkan kelas ke siswa
    Route::get('/kelas/pilih', function(){
        $siswaId = Pengajar::with(['kelas','guru'])->where('guru_id',Auth::user()->id)->pluck('kelas_id')->toArray();
        $kelas = Kelas::all()->where('bangku_tersisa','>=',1)->whereIn('id',$siswaId);
        return view('kelas.pilihkelas',['data'=> $kelas,'siswa'=>$siswaId]);
    })->name('siswa.kelas.pilih');

    //delete kelas dari siswa
    Route::post('/kelas/siswa/update/{siswa:nis}',[SclassController::class,'deletekelas'])->name('kelas.editsiswa');

    //show list siswa yang masih kosong kelasnya untuk di masukkan kelas
    Route::get('/siswa/addkelas/{kelas:id}', [SclassController::class,'index'])->name('siswa.kelas');

    //update kelas siswa dan memasukkan jumlah siswa dalam kelas
    Route::post('/siswa/add/kelas', [SclassController::class, 'updateStudents'])->name('siswa.kelas.add');
    
    //kelas add
    Route::post('/kelas/add/new', [KelasController::class, 'store'])->name('kelas.add');
    
    //kelas redirect to edit
    Route::get('/kelas/edit/{kelas:id}', function(Kelas $kelas){
        return view('kelas.editkelas',['id'=>$kelas->id,'name'=>$kelas]);
    })->name('kelas.edit');
    
    //kelas edit
    Route::post('/kelas/edit/new/{id}', [KelasController::class, 'update'])->name('kelas.update');
    
    //kelas delete
    Route::post('/kelas/delete/{id}', [KelasController::class, 'destroy'])->name('kelas.delete');

    //master absensi
    Route::get('/mabs', function(){
        return view('Absensi.menuabsensi');
    })->name('absensi.choose');

    //pilih kelas untuk melakukan absensi
    Route::get('/absensi', [LogController::class,'showKelas'])->name('absensi.kelas');

    //pilih kelas untuk melakukan absensi
    Route::post('/kehadiran/edit/{id}', [LogController::class,'editLog'])->name('absensi.edit');

    //pilih kelas untuk mengedit data
    Route::get('/kehadiran', [LogController::class,'showKelasMenu'])->name('kehadiran.show');

    //edit kehadiran
    Route::get('/kehadiran/{kelas:id}', function(Kelas $kelas){
        $hariIni = Logkehadiran::where('kelas_id','=',$kelas->id)->where('tanggal','=',now()->format('Y-m-d'))->pluck('tanggal');
        // $siswa = Logkehadiran::with(['siswa', 'kelas'])
        // ->where('kelas_id', '=', $kelas->id)
        // ->when(request('search'), function ($query) {
        //     $datsiswa = Siswa::where('name', 'like', '%' . request("search") . '%')
        //         ->pluck('nis')->toArray();
        //     return $query->whereIn('siswa_id', $datsiswa);
        // })
        // ->when(request('date'), function ($query) {
        //     return $query->where('tanggal', 'like', '%' . request('date') . '%');
        // }, function ($query) use ($hariIni) {
        //     // Jika tidak ada tanggal, ambil semua kehadiran yang sesuai dengan pencarian
        //     return $query->whereIn('tanggal', $hariIni);
        // })
        // ->get();
        if(request('date')){
            $hariIni = Logkehadiran::where('kelas_id','=',$kelas->id)->where('tanggal','=',request('date'))->pluck('tanggal');
            $siswa = Logkehadiran::with(['siswa','kelas'])->where('kelas_id','=',$kelas->id)
            ->whereIn('tanggal',$hariIni)->get();
        }
        if(request('search')){
            $datsiswa = Siswa::where('name','like','%'.request("search").'%')->pluck('nis')->toArray();

            $siswa = Logkehadiran::with(['siswa','kelas'])
            ->where('kelas_id','=',$kelas->id)
            ->whereIn('siswa_id',$datsiswa)
            ->whereIn('tanggal',$hariIni)
            ->get();
        }
        else{
            $siswa = Logkehadiran::with(['siswa','kelas'])->where('kelas_id','=',$kelas->id)
            ->whereIn('tanggal',$hariIni)->get();
        }
        return view('Absensi.editabsensi',['kelas'=>$kelas,'siswa'=>$siswa,'hrini'=>$hariIni]);
    })->name('kehadiran.edit');
    
    //absensi
    Route::get('/absensi/kelas/{kelas:id}', [LogController::class,'index'])->name('absensi.kelas.siswa');

    //add log
    Route::post('/absensi', [LogController::class,'addLog'])->name('absensi.add');

    //show guru
    Route::get('/guru', [PengajarController::class,'showPengajar'])->name('guru.main');

    Route::post('/guru/add',[PengajarController::class,'addGuru'])->name('pengajar.add');
   
    Route::post('/guru/{id}',[PengajarController::class,'destroy'])->name('pengajar.delete');

    //chart in dashboard
    Route::get('/', [ChartController::class, 'index'])->name('dashboard.tampil');

});





