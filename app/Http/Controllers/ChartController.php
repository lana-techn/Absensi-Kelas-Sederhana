<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pengajar;
use App\Models\Logkehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan nip user yang sedang login
        $nip = Auth::user()->nip;

        // Mendapatkan tanggal dari request atau menggunakan tanggal hari ini
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());

        // Mendapatkan kelas yang diajar oleh pengajar yang sedang login
        $kelasYangDiajarkan = Pengajar::where('guru_id', $nip)->pluck('kelas_id');

        // Mengambil data log kehadiran untuk kelas yang terkait dengan pengajar dan filter berdasarkan tanggal
        $logKehadiran = Logkehadiran::with(['guru', 'siswa', 'kelas'])
            ->whereDate('tanggal', $tanggal) // Filter berdasarkan tanggal
            ->whereIn('kelas_id', $kelasYangDiajarkan) // Filter berdasarkan kelas yang diajar pengajar
            ->where('guru_id',Auth::user()->id)
            ->get();
        $kelas = Kelas::whereIn('id',$kelasYangDiajarkan)->pluck('name');
        $from = Carbon::now()->startOfWeek();
        $to = Carbon::now()->endOfWeek();
        $logKehadiranPerminggu = Logkehadiran::with(['siswa', 'kelas'])
            ->whereBetween('tanggal', [$from,$to]) // Filter berdasarkan tanggal
            ->whereIn('kelas_id', $kelasYangDiajarkan) // Filter berdasarkan kelas yang diajar pengajar
            ->where('guru_id',Auth::user()->id)
            ->get();

        // Mengelompokkan data berdasarkan kelas dan menghitung jumlah status kehadiran
        $datamingguan = [];
        $dataPerKelas = [];
        foreach ($logKehadiran->groupBy('kelas_id') as $kelasId => $logKelas) {
            $dataPerKelas[$kelasId] = [
                'Hadir' => $logKelas->where('status', 'Hadir')->count(),
                'Izin'  => $logKelas->where('status', 'Izin')->count(),
                'Sakit' => $logKelas->where('status', 'Sakit')->count(),
                'Alpha' => $logKelas->where('status', 'Alpha')->count(),
            ];
        }
        foreach ($logKehadiranPerminggu->groupBy('kelas_id') as $kelasId => $logKelas) {
            $datamingguan[$kelasId] = [
                'Hadir' => $logKelas->where('status', 'Hadir')->count(),
                'Izin'  => $logKelas->where('status', 'Izin')->count(),
                'Sakit' => $logKelas->where('status', 'Sakit')->count(),
                'Alpha' => $logKelas->where('status', 'Alpha')->count(),
            ];
        }

        // Mengirimkan data per kelas dan tanggal yang dipilih ke view
        return view('teacher', compact('dataPerKelas', 'tanggal','datamingguan','kelas'));
    }
    
    public function testing(){
        
        return view('teacher', compact('dataPerKelas', 'tanggal'));
    }
}
