<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistics;
use Illuminate\Support\Facades\File;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistics = Statistics::all();
        return view('statistics.index',compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statistics.create');
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
            'company_name' => 'required',
            'rate' => 'required',
            'review_count' => 'required',
            'company_logo' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $rasmNomi = "";

        if ($request->hasFile('company_logo')) {
            $rasm = $request->file('company_logo');

            // Rasm nomini generatsiya qilish
            $rasmNomi = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('statistics-image'), $rasmNomi);
        }

        Statistics::create([
            'company_name'     => $request->company_name,
            'rate'      => $request->rate,
            'review_count'      => $request->review_count,
            'company_logo'     => $rasmNomi
        ]);

        return redirect()->route('statistics.index');
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
        $statistics = Statistics::find($id);
        return view('statistics.edit',compact('statistics'));
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
            'company_name' => 'required',
            'rate' => 'required',
            'review_count' => 'required',
            'company_logo' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $rasmUrl = public_path('statistics-image/' . Statistics::find($id)->image);

        if (File::exists($rasmUrl)) {
            File::delete($rasmUrl);
        }

        $rasmNomi = Statistics::find($id)->company_logo;

        if ($request->hasFile('company_logo')) {
            $rasm = $request->file('company_logo');

            // Rasm nomini generatsiya qilish
            $rasmNomi = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('statistics-image'), $rasmNomi);
        }

        Statistics::find($id)->update([
            'company_name'     => $request->company_name,
            'rate'      => $request->rate,
            'review_count'      => $request->review_count,
            'company_logo'     => $rasmNomi
        ]);

        return redirect()->route('statistics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Statistics::find($id)->delete();
        return redirect()->route('statistics.index');
    }

    public function getPaginatedData(Request $request)
    {
        $paginationCount = $request->input('pagination_count', 10);
        $pageNumber = $request->input('page_number', 1);

        // Ma'lumotlarni olish
        $data = DB::table('statistics')->paginate($paginationCount, ['*'], 'page', $pageNumber);

        // Paginatsiya ma'lumotlarni JSON formatida qaytarish
        return response()->json($data);
    }
}
