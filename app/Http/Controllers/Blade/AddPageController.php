<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\addPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AddPageController extends Controller
{
    public function index()
    {
        $addpage = addPage::all();
        return view('add-page.index',compact('addpage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-page.create');
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
            $rasm->move(public_path('page-image'), $rasmNomi);
        }

        addPage::create([
            'title'     => $request->title,
            'desc'      => $request->desc,
            'url'     => $request->url,
            'image'     => $rasmNomi
        ]);

        return redirect()->route('page-body.index');
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
        $addpage = addPage::find($id);
        return view('add-page.edit',compact('addpage'));
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

        $rasmUrl = public_path('page-image/' . addPage::find($id)->image);

        if (File::exists($rasmUrl)) {
            File::delete($rasmUrl);
        }

        $rasmNomi = "";

        if ($request->hasFile('file')) {
            $rasm = $request->file('file');

            // Rasm nomini generatsiya qilish
            $rasmNomi = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('page-image'), $rasmNomi);
        }

        addPage::find($id)->update([
            'title'     => $request->title,
            'desc'      => $request->desc,
            'url'     => $request->url,
            'image'     => $rasmNomi
        ]);

        return redirect()->route('page-body.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        addPage::find($id)->delete();
        return redirect()->route('page-body.index');
    }
}
