<?php

namespace App\Http\Controllers;

use App\Pengajar;
use App\Program;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $pengajars = Pengajar::with('get_program')->paginate(5);
        return view('pengajar.data', compact('pengajars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $program = Program::all();
        return view('pengajar.create', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'fname' => 'required|min:2',
            'lname' => 'required|min:2',
            'kompetensi' => 'required',
            ],[
            'fname.required' => 'Jangan Kosongin..',
            'lname.required' => 'Jangan Kosongin, yaa..'
            ]
        );
        Pengajar::create($request->all());

        return redirect('pengajar')->with('status', 'Berhasil Menambah Data');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajar $pengajar){
        $program = Program::all();
        return view('pengajar.edit', compact('pengajar', 'program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $request->validate([
            'fname' => 'required|min:2',
            'lname' => 'required|min:2',
            'kompetensi' => 'required',
            ],[
            'fname.required' => 'Jangan Kosongin..',
            'lname.required' => 'Jangan Kosongin, yaa..'
            ]
        );
        Pengajar::where('id', $id)
        ->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'kompetensi' => $request->kompetensi,
            'program_id' => $request->program_id,
            'age' => $request->age,
            'alamat' => $request->alamat
        ]);

        return redirect('pengajar')->with('status', 'Berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    
        Pengajar::where('id', $id)->delete();
        return redirect('pengajar')->with('status', 'Berhasil Dihapus');
    }

    public function trash(){
        $pengajars = Pengajar::onlyTrashed()->get(); 

        return view('pengajar/recycle_bin', compact('pengajars'));
    }

    public function delete_permanent($id = null){
        if($id != null){
            Pengajar::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        
        }else if($id->count()>0) {
            Pengajar::onlyTrashed()
            ->forceDelete();
            
        }
        return redirect('pengajar/trash')->with('status', 'Berhasil Didelete');
        
    }

    public function restore($id = null){
        if($id != null){
            Pengajar::onlyTrashed()
            ->where('id', $id)
            ->restore();
            
        }
        else{
            Pengajar::onlyTrashed()
            ->restore();
            
        }
        return redirect('pengajar/trash')->with('status', 'Berhasil direstore');
        
    }
}
