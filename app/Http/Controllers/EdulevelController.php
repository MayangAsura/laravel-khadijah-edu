<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EdulevelController extends Controller
{
    public function data(){

        $edulevels = DB::table('edulevels')->get();
        
        return view('edulevel.data')->with('edulevels', $edulevels); // CARA PASSING DATA 
        // return view('edulevel.data', compact('edulevels')); // CARA PASSING DATA jika VARIABEL nya SAMA
        // return view('edulevel.data', ['edulevels'=> $edulevels]); // CARA PASSING DATA
        // dd($edulevels); // outputnya seperti VAR_DUMP (ADA OBJECT NYA)
        // return $edulevels; // outputnya seperti print_r (satu baris)
        // return view('edulevel.data'); // view('edulevel/data'); BISA JUGA
    }

    public function add(){
        return view('edulevel.add');
    }

    public function addProcess(Request $request){

        $request->validate([
            'nameIn' => 'required|min:2', // MISAL minimal 2 karakter
            'descIn' => 'required',
        ], [
            'nameIn.required' => 'Jangan Kosongin..', // JIKA MAU CUSTOM message
            'descIn.required' => 'Ini juga kosong ni..'
        ]);
        //PAKAI QUERY BUILDER
        DB::table('edulevels')->insert([
            'name' => $request->nameIn, //nameIn == name yg ada di form 
            'desc' => $request->descIn 
        ]);
        //CONTOH RETURN + SESSION FLASHDATA
        return redirect('edulevels')->with('status', 'Jenjang Ditambahkan!');
    }

    public function edit($id){

        $edulevels = DB::table('edulevels')->where('id', $id)->first();
        // dd($edulevels); JIKA RAGU DD aja dulu
    
        return view('edulevel.edit', compact('edulevels'));
    }

    public function editProcess(Request $request , $id){

        $request->validate([
            'nameIn' => 'required|min:2', // MISAL minimal 2 karakter
            'descIn' => 'required',
        ]);
        DB::table('edulevels')->where('id', $id)->update([
            'name' => $request->nameIn, //nameIn == name yg ada di form 
            'desc' => $request->descIn 
        ]);
        return redirect('edulevels')->with('status', 'Jenjang DiUpdate!');
    }

    public function delete($id){

        DB::table('edulevels')->where('id', $id)->delete();
        return redirect('edulevels')->with('status', 'Jenjang Dihapus!');
    }
}
