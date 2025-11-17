<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SclassController extends Controller
{

    public function index(string $id)
    {
        // Ambil data kelas berdasarkan id untuk mendapatkan bangku_tersisa
        $kelas = Kelas::find($id);  // Ambil kelas berdasarkan id
        $bangkuTersisa = $kelas->bangku_tersisa;  // Dapatkan nilai bangku_tersisa
    
        // Jika ada pencarian
        if (request("search")) {
            $siswa = Siswa::where('name', 'like', '%' . request("search") . '%')
                          ->whereNull('kelas_id') // Hanya siswa yang belum ada kelas
                          ->get();
        } else {
            // Jika tidak ada pencarian, ambil semua siswa yang belum memiliki kelas
            $siswa = Siswa::whereNull('kelas_id')->get();
        }
    
        // Mengirimkan id, siswa, dan bangku_tersisa ke view
        return view('kelas.siswakelas', compact('id', 'siswa', 'bangkuTersisa','kelas'));
    }
    
    

    public function updateStudents(Request $request)
    {
        $selectedStudents = $request->input('students');  // Array of selected NIS
        $kelasId = $request->input('id_kelas');  // Kelas ID yang ingin diupdate
        $bangku = $request->input('bangku_tersisa');  // Kelas ID yang ingin diupdate

        // Validasi jika kelas_id dikirim atau siswa dipilih
        if (empty($selectedStudents) || empty($kelasId) || $bangku <= 0 || $bangku - count($selectedStudents) < 0) {
            return redirect()->back()->with('error', 'Siswa yang bisa dimasukkan hanya '. $bangku.' orang');
        }

        // Lakukan update kelas_id untuk siswa yang dipilih
        DB::table('siswas')
            ->whereIn('nis', $selectedStudents)
            ->update(['kelas_id' => $kelasId]);
        // DB::table('kelas')
        //     ->whereIn('id', $kelasId)
        //     ->update(['jumlah_siswa' => $j_kelas]);

        $data = Siswa::where('kelas_id','like','%'.$kelasId.'%')->count();
        Kelas::where('id', $kelasId)->update([
            'jumlah_siswa' => $data,
            'bangku_tersisa'=>$bangku - count($selectedStudents)
        ]);
        
        return redirect()->back()->with('success', "Berhasil Menambahkan siswa ke dalam kelas");
    }

    public function deletekelas(string $id, Request $request){
        $siswa = Siswa::where('nis', $id)->pluck('kelas_id');
        $rombel = Kelas::whereIn('id',$siswa)->pluck('rombel')->first();
        Siswa::where('nis', $id)->update(['kelas_id' => null]);
        $data = Siswa::where('kelas_id','like','%'.request('id_kelas').'%')->count();
        
        Kelas::where('id', request('id_kelas'))->update([
            'jumlah_siswa' => $data,
            'bangku_tersisa'=> $rombel - $data
        ]);
        return redirect()->back()->with('success', "berhasil menghapus data");
        // return redirect()->back()->with('success', request('id_kelas'));
    }
}
