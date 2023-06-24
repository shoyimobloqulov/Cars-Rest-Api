<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Reasons;

class ReasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reasons = Reasons::all();
        return view('reasons.index',compact('reasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reasons.create');
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
            'file' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $rasmNomi = "";

        if ($request->hasFile('file')) {
            $rasm = $request->file('file');

            // Rasm nomini generatsiya qilish
            $rasmNomi = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('reasons-image'), $rasmNomi);
        }

        Reasons::create([
            'title'     => $request->title,
            'desc'      => $request->desc,
            'logo'     => $rasmNomi
        ]);

        return redirect()->route('reasons.index');
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
        $reasons = Reasons::find($id);
        return view('reasons.edit',compact('reasons'));
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
            'file' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $rasmUrl = public_path('reasons-image/' . Reasons::find($id)->image);

        if (File::exists($rasmUrl)) {
            File::delete($rasmUrl);
        }


        $rasmNomi = "";

        if ($request->hasFile('file')) {
            $rasm = $request->file('file');

            // Rasm nomini generatsiya qilish
            $rasmNomi = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('reasons-image'), $rasmNomi);
        }

        Reasons::find($id)->update([
            'title'     => $request->title,
            'desc'      => $request->desc,
            'logo'     => $rasmNomi
        ]);

        return redirect()->route('reasons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reasons::find($id)->delete();
        return redirect()->route('reasons.index');
    }
}
