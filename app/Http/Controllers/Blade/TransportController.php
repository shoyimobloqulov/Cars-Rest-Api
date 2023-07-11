<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TransportController extends Controller
{

    public function index()
    {
        $count = count(Transport::all());
        if($count < 1){
            Transport::create([]);
        }
        $transport = Transport::get()[0];
        return view('transport.index',compact('transport'));
    }

    public function update(Request $request,string $id)
    {
//        $validated = $request->validate([
//            'desc'    => 'required',
//            'title'    => 'required',
//
//            'icon1' =>  'image|mimes:jpeg,png,jpg,gif',
//            'icon2' =>  'image|mimes:jpeg,png,jpg,gif',
//            'icon3' =>  'image|mimes:jpeg,png,jpg,gif',
//            'icon4' =>  'image|mimes:jpeg,png,jpg,gif',
//
//            'title1'    => 'required',
//            'title2'    => 'required',
//            'title3'    => 'required',
//            'title4'    => 'required',
//
//            'desc1'    => 'required',
//            'desc2'    => 'required',
//            'desc3'    => 'required',
//            'desc4'    => 'required',
//        ]);

        $rasmUrl1 = public_path('transport-image/' . Transport::find($id)->icon1);
        $rasmUrl2 = public_path('transport-image/' . Transport::find($id)->icon2);
        $rasmUrl3 = public_path('transport-image/' . Transport::find($id)->icon3);
        $rasmUrl4 = public_path('transport-image/' . Transport::find($id)->icon4);

        if (File::exists($rasmUrl1)) {
            File::delete($rasmUrl1);
        }

        if (File::exists($rasmUrl2)) {
            File::delete($rasmUrl2);
        }

        if (File::exists($rasmUrl3)) {
            File::delete($rasmUrl3);
        }

        if (File::exists($rasmUrl4)) {
            File::delete($rasmUrl4);
        }

        $rasmNomi1 = Transport::find($id)->icon1;
        $rasmNomi2 = Transport::find($id)->icon2;
        $rasmNomi3 = Transport::find($id)->icon3;
        $rasmNomi4 = Transport::find($id)->icon4;

        if ($request->hasFile('icon1')) {
            $rasm = $request->file('icon1');

            // Rasm nomini generatsiya qilish
            $rasmNomi1 = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('transport-image'), $rasmNomi1);
        }

        if ($request->hasFile('icon2')) {
            $rasm = $request->file('icon2');

            // Rasm nomini generatsiya qilish
            $rasmNomi2 = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('transport-image'), $rasmNomi2);
        }

        if ($request->hasFile('icon3')) {
            $rasm = $request->file('icon3');

            // Rasm nomini generatsiya qilish
            $rasmNomi3 = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('transport-image'), $rasmNomi3);
        }

        if ($request->hasFile('icon4')) {
            $rasm = $request->file('icon4');

            // Rasm nomini generatsiya qilish
            $rasmNomi4 = time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('transport-image'), $rasmNomi4);
        }

        Transport::find($id)->update([
            'desc'      => $request->desc,
            'title'     => $request->title,

            'icon1'     =>  $rasmNomi1,
            'icon2'     =>  $rasmNomi2,
            'icon3'     =>  $rasmNomi3,
            'icon4'     =>  $rasmNomi4,

            'title1'    => $request->title1,
            'title2'    => $request->title2,
            'title3'    => $request->title3,
            'title4'    => $request->title4,

            'desc1'     => $request->desc1,
            'desc2'     => $request->desc2,
            'desc3'     => $request->desc3,
            'desc4'     => $request->desc4,
        ]);
        return redirect()->route('transport.index');
    }
}
