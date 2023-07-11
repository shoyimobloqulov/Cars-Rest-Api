<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Stories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Stories::all();
        return view('stories.index',compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stories.create');
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
            'date' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $rasmNomi = "";

        if ($request->hasFile('file')) {
            $rasm = $request->file('file');

            // Rasm nomini generatsiya qilish
            $rasmNomi = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('stories-image'), $rasmNomi);
        }

        Stories::create([
            'title'     => $request->title,
            'desc'      => $request->desc,
            'data'      => $request->date,
            'image'     => $rasmNomi
        ]);

        return redirect()->route('stories.index');
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
        $stories = Stories::find($id);
        return view('stories.edit',compact('stories'));
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
            'date' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $rasmNomi = "";

        $rasmUrl = public_path('stories-image/' . Hero::find($id)->image);

        if (File::exists($rasmUrl)) {
            File::delete($rasmUrl);
        }


        if ($request->hasFile('file')) {
            $rasm = $request->file('file');

            // Rasm nomini generatsiya qilish
            $rasmNomi = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('stories-image'), $rasmNomi);
        }

        Stories::find($id)->update([
            'title'     => $request->title,
            'desc'      => $request->desc,
            'data'      => $request->date,
            'image'     => $rasmNomi
        ]);

        return redirect()->route('stories.index');
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

    public function getPaginatedData(Request $request)
    {
        $paginationCount = $request->input('pagination_count', 10);
        $pageNumber = $request->input('page_number', 1);

        // Ma'lumotlarni olish
        $data = DB::table('stories')->paginate($paginationCount, ['*'], 'page', $pageNumber);

        // Paginatsiya ma'lumotlarni JSON formatida qaytarish
        return response()->json($data);
    }

}
