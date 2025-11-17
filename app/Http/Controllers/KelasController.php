<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function menuKelas(Kelas $kelas){
        if(request("search")){
            $siswa = Kelas::all()->where('id',$kelas->id);
            $siswa = Siswa::where('kelas_id','=' ,$kelas->id)->where('name','like','%'.request("search").'%')->get();
        }
        else{
            $kela = Kelas::all()->where('id',$kelas->id)->pluck('id')->first();
            $siswa = Siswa::where("kelas_id",$kela)->get();
        }
        return view('kelas.listsiswa',['jsiswa'=>$kelas->jumlah_siswa,'bangku'=>$kelas->bangku_tersisa,'id'=>$kelas->id,'nama'=>$kelas->name, 'siswa'=>$siswa]);
    }

    public function index()
    {
        //showing data to table
        $max_tampil = 20;
        
        if(request("search")){
            $data = Kelas::where('name','like','%'.request("search").'%')->paginate($max_tampil)->withQueryString();
        }
        else{
            $data = Kelas::orderBy('name','asc')->paginate($max_tampil)->withQueryString();
        }
        return view('kelas.kelasshow',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //POST data
        $request->validate([
            'name' => 'required|unique:kelas',
            'bangku_tersisa' => 'required|digits_between:1,2|numeric'
        ],[
            'name.required' => 'nama harus diisi',
            'name.unique' => 'Nama Kelas sudah ada',
            'bangku_tersisa.required'=>'Jumlah siswa harus diisi',
            'bangku_tersisa.numeric'=>'Jumlah siswa harus berupa angka',
        ]);

        $bangku = $request->input('bangku_tersisa');
        $data = [
            'name' => $request->input('name'),
            'bangku_tersisa' => $bangku,
            'rombel' => $bangku,
        ];
        $datax = [$data];

        Kelas::create($data);
        return redirect()->route('kelas.tampil')->with('success',$datax);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Edit data
        $jumlah_siswa = Kelas::where('id', $id)->pluck('jumlah_siswa')->first();
        if($request->input('bangku_tersisa')){
         $ndata = $jumlah_siswa == 0 ? $request->input('bangku_tersisa') : $request->input('bangku_tersisa')-$jumlah_siswa;   
        }

        $request->validate([
            'name' => 'required',
            'bangku_tersisa' => 'required|digits_between:1,2|numeric'
        ],[
            'name.required' => 'nama harus diisi',
            'bangku_tersisa.required'=>'Jumlah siswa harus diisi',
            'bangku_tersisa.numeric'=>'Jumlah siswa harus berupa angka',
        ]);

        $data = [
            'name' => $request->input('name'),
            'bangku_tersisa' => $ndata,
            'rombel' => $request->input('bangku_tersisa'),
            
        ];

        Kelas::where('id', $id)->update($data);
        return redirect()->route('kelas.tampil')->with('success','Berhasil Mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete data
        Kelas::where('id',$id)->delete();
        return redirect()->route('kelas.tampil')->with('success',"Berhasil menghapus data");
    }
}
