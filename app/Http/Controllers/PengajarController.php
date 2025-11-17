<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajarController extends Controller
{
    public function addGuru(){
        $guru_id = User::where('nip', request()->input('nip'))->pluck('id')->first();
        foreach (request()->input('kelas') as $item){

            $data = [
                'guru_id'=>$guru_id,
                'kelas_id'=> $item
            ];
            Pengajar::create($data);

        }
        return redirect()->back()->with('success',"Berhasil Menambahkan Kelas");
    }

    public function showPengajar()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();
        
        // Ambil semua pengajars yang terkait dengan pengguna ini
        $pengajars = Pengajar::where('guru_id', $user->id)->pluck('kelas_id')->toArray();

        $data = User::with('pengajars')->where('id', Auth::user()->id)->get();

        $pengajar = Pengajar::all();

        // Ambil semua kelas
        $kelas = Kelas::all();
        

        //showing data to table
        $max_tampil = 5;
        
        if(request("search")) {
            $kelasBelumTerhubung = Kelas::where('name', 'like', '%' . request("search") . '%')
                ->whereNotIn('id', $pengajars)
                ->get();
        } else {
            $kelasBelumTerhubung = Kelas::whereNotIn('id', $pengajars)->get();
        }
        
        // Kirim data ke view
        return view('guru.ngajar', [
            'data' => $data,  // Data pengajar yang sudah terhubung
            'kelas' => $kelasBelumTerhubung, // Kelas yang belum terhubung
            'id'=>$pengajar
        ]);
    }

    public function destroy(string $id){
        
        Pengajar::where('id',$id)->delete();
        return redirect()->route('guru.main')->with('success',"Berhasil menghapus data");
    }

}
