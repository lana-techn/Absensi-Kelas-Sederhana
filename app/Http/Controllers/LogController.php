<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Logkehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    //
    public function index(Kelas $kelas){
        $kecuali = Logkehadiran::where('tanggal',Carbon::today())->where('guru_id',Auth::user()->id)->pluck('siswa_id')->toArray();
        $kelasExcepted = Siswa::where('kelas_id','=',$kelas->id)->count();
        if(request("search")){
            $siswa = Siswa::where('kelas_id','=',$kelas->id)->where('name','like','%'.request("search").'%')->whereNotIn('id',$kecuali)->get();
        }
        else{
            $siswa = Siswa::where('kelas_id','=',$kelas->id)->whereNotIn('id',$kecuali)->get();
        }
        
        return view('Absensi.absensikelas',['kelas'=>$kelas,'siswa'=>$siswa,'exc'=>$kelasExcepted]);
    }

    public function showKelas(){
        $kelas = User::with('pengajars')->where('id','=',Auth::user()->id)->get();
        return view('Absensi.masterabsensi',['data'=>$kelas]);
    }

    public function showKelasMenu(){
        $kelas = User::with('pengajars')->where('id','=',Auth::user()->id)->get();
        return view('Absensi.menudatahadir',['data'=>$kelas]);
    }
    public function addLog(Request $request){
        $data = [
            'guru_id' => Auth::user()->id,
            'siswa_id' => $request->input('siswa_id'),
            'kelas_id' => $request->input('kelas'),
            'status' => $request->input('status'),
            'tanggal' => now(),
        ];
        Logkehadiran::create($data);
        $siswa = Siswa::where('id','like','%'.$request->input('siswa_id').'%')->get();
        return redirect()->back()->with('success', 'Siswa '.$siswa[0]->name.' telah melakukan presensi');
    }
    public function editLog(Request $request, string $id){
        $data = [
            'status' => $request->input('status'),
        ];
        Logkehadiran::where('id',$id)->update($data);
        $siswa = Siswa::where('nis','like','%'.$request->input('siswa_id').'%')->get();
        return redirect()->back()->with('success', 'Berhasil mengupdate absensi dari '.$siswa[0]->name);
    }
}
