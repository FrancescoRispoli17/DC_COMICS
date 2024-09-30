<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\Comic;
use App\Models\User;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator;
use Spatie\Permission\Models\Role;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists=Artist::all();
        return view('comics.create',compact('artists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $data= $this->validation($request->all());
        $comic=new Comic();
        $comic->fill($data);

        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        // $role = Role::create(['name' => 'dataMenager']);
        // $user = User::find(1);
        // $user->assignRole('dataMenager');
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit',compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        $comic->update($data);

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index');
    }

    public function validation($data)
    {
        $validation = FacadesValidator::make($data,[
             'title'=>'required|max:50',
             'description'=>'required|max:1000',
             'thumb'=>'required|max:350',
             'price'=>'required|integer|min:0',
             'series'=>'required|max:100',
             'sale_date'=>'required|date',
             'type'=>'required|max:20',   
        ],[
            'title.required' => 'Inserisci il titolo',
            'title.max' => 'Inserire massimo 50 caratteri',
            'description.required' => 'Inserisci la descrizione',
            'description.required' => 'Inserire massimo 1000 caratteri',
            'thumb.required' => 'Inserisci indirizzo foto',
            'price.required' => 'Inserisci il prezzo',
            'price.min' => 'prezzo minimo 0',
            'series.required' => 'Inserisci la serie',
            'series.max' => 'Inserire massimo 100 caratteri',
            'sale_date.required' => 'Inserisci la data',
            'type.required' => 'Inserisci il tipo',
            'type.max' => 'Inserire massimo 20 caratteri',   
        ])->validate();
        return $validation;
    }
}
