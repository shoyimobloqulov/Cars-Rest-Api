<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DB;
use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::all();
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'name' => 'required',
            'rate' => 'required',
            'desc' => 'required',
            'date' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $rasmNomi = "";

        if ($request->hasFile('logo')) {
            $rasm = $request->file('logo');

            // Rasm nomini generatsiya qilish
            $rasmNomi = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('companies-image'), $rasmNomi);
        }

        Companies::create([
            'name'     => $request->name,
            'rate'      => $request->rate,
            'desc'      => $request->desc,
            'date'      => $request->date,
            'logo'     => $rasmNomi
        ]);

        return redirect()->route('companies.index');
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
        $companies = Companies::find($id);
        return view('companies.edit',compact('companies'));
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
            'name' => 'required',
            'rate' => 'required',
            'desc' => 'required',
            'date' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $rasmUrl = public_path('companies-image/' . Companies::find($id)->image);

        if (File::exists($rasmUrl)) {
            File::delete($rasmUrl);
        }

        $rasmNomi = Companies::find($id)->logo;

        if ($request->hasFile('logo')) {
            $rasm = $request->file('logo');

            // Rasm nomini generatsiya qilish
            $rasmNomi = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('companies-image'), $rasmNomi);
        }

        Companies::find($id)->create([
            'name'     => $request->name,
            'rate'      => $request->rate,
            'desc'      => $request->desc,
            'date'      => $request->date,
            'logo'     => $rasmNomi
        ]);

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Companies::find($id)->delete();
        return redirect()->route('companies.index');
    }

    public function getPaginatedData(Request $request)
    {
        $paginationCount = $request->input('pagination_count', 10);
        $pageNumber = $request->input('page_number', 1);

        // Ma'lumotlarni olish
        $data = DB::table('companies')->paginate($paginationCount, ['*'], 'page', $pageNumber);

        // Paginatsiya ma'lumotlarni JSON formatida qaytarish
        return response()->json($data);
    }
}
