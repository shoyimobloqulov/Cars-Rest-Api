<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = Logo::all();
        return view('logo.index',compact('logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logo.create');
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
            'logo' =>  'image|mimes:jpeg,png,jpg,gif',
        ]);

        
        $rasmNomi = "";

        if ($request->hasFile('logo')) {
            $rasm = $request->file('logo');

            // Rasm nomini generatsiya qilish
            $rasmNomi = 'logo-'.time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('/logo-image'), $rasmNomi);
        }

        Logo::create([
            'logo' => $rasmNomi
        ]);

        return redirect()->route('logo.index');
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
        $logo = Logo::find($id);
        return view('logo.edit',compact('logo'));
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
            'logo' =>  'image|mimes:jpeg,png,jpg,gif',
        ]);

        
        $rasmNomi = "";

        $rasmUrl = public_path('/logo-image' . Logo::find($id)->logo);

        if (File::exists($rasmUrl)) {
            File::delete($rasmUrl);
        }

        if ($request->hasFile('logo')) {
            $rasm = $request->file('logo');

            // Rasm nomini generatsiya qilish
            $rasmNomi = 'logo-'.time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('/logo-image'), $rasmNomi);
        }

        Logo::find($id)->update([
            'logo' => $rasmNomi
        ]);

        return redirect()->route('logo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Logo::find($id)->delete();
        return redirect()->route('logo.index');
    }
}
