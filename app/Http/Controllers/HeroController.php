<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Hero;
class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Hero::all();
        return view('hero.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'url'   => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $rasmNomi = "";

        if ($request->hasFile('file')) {
            $rasm = $request->file('file');

            // Rasm nomini generatsiya qilish
            $rasmNomi = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('hero-image'), $rasmNomi);
        }

        Hero::create([
            'title'     => $request->title,
            'desc'      => $request->desc,
            'url'     => $request->url,
            'image'     => $rasmNomi
        ]);

        return redirect()->route('hero.index');
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
    public function edit($id)
    {
        $question = Hero::find($id);
        return view('hero.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'url'   => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $rasmUrl = public_path('hero-image/' . Hero::find($id)->image);

        if (File::exists($rasmUrl)) {
            File::delete($rasmUrl);
        }

        $rasmNomi = "";

        if ($request->hasFile('file')) {
            $rasm = $request->file('file');

            // Rasm nomini generatsiya qilish
            $rasmNomi = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('hero-image'), $rasmNomi);
        }

        Hero::find($id)->update([
            'title'     => $request->title,
            'desc'      => $request->desc,
            'url'     => $request->url,
            'image'     => $rasmNomi
        ]);

        return redirect()->route('hero.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hero::find($id)->delete();
        return redirect()->route('hero.index');
    }
}
