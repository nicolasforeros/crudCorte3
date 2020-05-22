<?php

namespace App\Http\Controllers;

use App\User;
use App\Paper;
use App\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\StorePaper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaperController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','downloadPaper']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $papers = Paper::orderBy('id')->paginate(10);
        return view('paper.index',['papers'=>$papers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categorie::pluck('id','name');
        return view('paper.create',['paper'=>new Paper(),'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaper $request)
    {
        //
        if($request->validated()){

            $pdf_url = $request->file('pdf_url')->store('public/'.(Auth::user()->email));

            Paper::create([
                'name' => request('name'),
                'user_id' => Auth::user()->id,
                'categorie_id' => request('categorie_id'),
                'description' => request('description'),
                'revision_date' => request('revision_date'),
                'state' => request('state'),
                'pdf_url' => $pdf_url,
            ]);
        }

        return redirect()->route('paper.index')->with('status','Articulo creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper)
    {
        //
        return view('paper.show',['paper'=>$paper]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit(Paper $paper)
    {
        //
        if(Auth::user()->id==$paper->user_id){
            $categories = Categorie::pluck('id','name');
            return view('paper.edit',['paper'=>$paper,'categories'=>$categories]);
        }else{
            return back()->with('statusError', 'No se puede editar este articulo');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(StorePaper $request, Paper $paper)
    {
        //
        if($request->validated()){

            $pdf_url = $request->file('pdf_url')->store('public/'.(Auth::user()->email));

            $paper->update([
                'name' => request('name'),
                'user_id' => Auth::user()->id,
                'categorie_id' => request('categorie_id'),
                'description' => request('description'),
                'revision_date' => request('revision_date'),
                'state' => request('state'),
                'pdf_url' => $pdf_url,
            ]);

            return redirect()->route('paper.index')->with('status','Articulo modificado con exito');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        //
        $paper->delete();
        return back()->with('status', 'El Articulo se ha eliminado con éxito.');
    }

    public function downloadPaper(Paper $paper)
    {
        return Storage::download($paper->pdf_url);
    }
}
