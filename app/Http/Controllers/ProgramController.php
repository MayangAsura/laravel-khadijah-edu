<?php

namespace App\Http\Controllers;

use App\Edulevel;
use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $program_data = Program::all(); //CARA 1 GET SEMUAN DATA DALAM TABLE DI MODEL PROGRAM 
        // $program_data = Program::with('edulevel')->get(); // edulevel = function utk get table edulevels
        // return $program;
        $program_data = Program::with('edulevel')->paginate(3);
        return view('program/index', compact('program_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $edulevels = Edulevel::all();
        return view('program/create', compact('edulevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'nameIn' => 'required|min:2',
            'edulevel_id' => 'required',
            ],[
            'nameIn.required' => 'Jangan Kosongin..',
            'edulevel_id.required' => 'Pilih edulevel..'
            ]);
        
        //CARA 1 INSERT
        // $program = new Program;
        // $program->name = $request->nameIn;
        // $program->edulevely_id = $request->edulevel_id;
        // $program->student_price = $request->priceIn;
        // $program->student_max = $request->maksIn;
        // $program->info = $request->infoIn;

        // $program->save();
        
        // CARA 2 : MASS ASSIGNMENT
        // Program::create([
        //     'name' => $request->nameIn,
        //     'edulevely_id' => $request->edulevel_id,
        //     'student_price' => $request->priceIn,
        //     'student_max' => $request->maksIn,
        //     'info' => $request->infoIn
        // ]);

        //CARA 3 : QUICK MASS ASSIGNMENT (syarat : nama field database = nama di name inputan)
        // Program::create($request->all());

        //CARA 4 : GABUNGAN
        $program = new Program([
            'name' => $request->nameIn,
            'edulevely_id' => $request->edulevel_id,
            'student_price' => $request->priceIn, // TETAP DITAMBAHKAN TAPI DIISI DI GUARDED, JADI GK MASUK KE DATABASE
            'student_max' => $request->maksIn,
            'info' => $request->infoIn
        ]);
        $program->student_price = '3000000'; // INI DI INJEK LANGSUNG, JADI TIDAK LEWAT INPUTAN
        $program->save();

        return redirect('program')->with('status', 'Berhasil Ditambahkan');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    // CARA ROUTE MODEL BINDING
    public function show(Program $program){
        // return $program; //CEK ISI
        $program->makeHidden(['edulevel_id', 'created_at']); // BISA UNTUK HIDDEN FIELD DI SINI

        return view('program.show', compact('program'));
    }
    //CARA MANUAL
    // public function show($id){
    //     $program = Program::find($id); // A.
        
    //     $program = Program::where('id', $id)->get(); // B.
    //     $program = $program[0];
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program){
        $edulevels = Edulevel::all();
        return view('program.edit', compact('edulevels', 'program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program){
        $request->validate([
            'nameIn' => 'required|min:2',
            'edulevel_id' => 'required',
            ],[
            'nameIn.required' => 'Jangan Kosongin..',
            'edulevel_id.required' => 'Pilih edulevel..'
            ]
        );
        //CARA 1
        // $program->name = $request->nameIn;
        // $program->edulevely_id = $request->edulevel_id;
        // $program->student_price = $request->priceIn;
        // $program->student_max = $request->maksIn;
        // $program->info = $request->infoIn;
        // $program->save();

        //CARA 2
        Program::where('id', $program->id)
        ->update([
            'name' => $request->nameIn,
            'edulevely_id' => $request->edulevel_id,
            'student_price' => $request->priceIn,
            'student_max' => $request->maksIn,
            'info' => $request->infoIn
        ]);

        return redirect('program')->with('status', 'Berhasil UPDATE');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program){
        //CARA 1
        // $program->delete();

        //CARA 2
        // Program::destroy($program->id);

        //CARA 3
        Program::where('id', $program->id)->delete();

        return redirect('program')->with('status', 'Berhasil Dihapus');
    }

    public function trash(){
        $programs = Program::onlyTrashed()->get();
        return view('program/trash', compact('programs'));
    }

    public function restore($id = null){
        if($id != null){
            $programs = Program::onlyTrashed()
            ->where('id', $id)
            ->restore();
        }else{
            $programs = Program::onlyTrashed()
            ->restore();
        }

        return redirect('program/trash')->with('status', 'Berhasil direstore');
    }

    public function delete_permanent($id = null){
        if($id != null){
            $programs = Program::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        }else{
            $programs = Program::onlyTrashed()
            ->forceDelete();
        }

        return redirect('program/trash')->with('status', 'Berhasil dihapus');
    }
}
