<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\Comic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::paginate(28);
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists=Artist::all();
        $user = auth()->user();

        if($user->hasRole('dataMenager')){
            return view('comics.create',compact('artists'));
        }
        return redirect()->route('comics.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComicRequest $request)
    {
    
        $data= $request->validated();
        $comic=new Comic();
        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        $comic->page = $data['page'];
        $comic->size = $data['size'];


        $comic->save();

            $comic->artists()->attach($request->artists);

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        $simils = Comic::join('comic_artist', 'comic_artist.comic_id', '=', 'comics.id')
            ->join('artists', 'comic_artist.artist_id', '=', 'artists.id')
            ->whereIn('artists.id', function($query) use ($comic) {
                $query->select('artist_id')
                    ->from('comic_artist')
                    ->where('comic_id', $comic->id);  // Artisti in comune con il fumetto corrente
            })
            ->where('comics.id', '!=', $comic->id)  // Escludere il fumetto corrente
            ->select('comics.*')  // Seleziona solo le colonne di "comics"
            ->groupBy('comics.id')  // Raggruppa per ID fumetto
            ->paginate(4);

            if (request()->ajax()) {
                return response()->json([
                    'html' => view('comics.partials.simils', compact('simils'))->render(),
                    'prev_page_url' => $simils->previousPageUrl(),
                    'next_page_url' => $simils->nextPageUrl(),
                    'on_first_page' => $simils->onFirstPage(),
                    'has_more_pages' => $simils->hasMorePages(),
                ]);
            }

        return view('comics.show', compact('comic','simils'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        $artists=Artist::all();
        $user = auth()->user();

        if($user->hasRole('dataMenager')){
            return view('comics.edit',compact('comic','artists'));
        }
        return redirect()->route('comics.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        $data = $request->all();

        $comic->update($data);

        $comic->artists()->sync($request->artists);

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

}
