<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        if(count($contact) == 0){
            Contact::create([]);
        }

        $contact = Contact::first();
        return view('contact.index',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
            'desc' => 'required',
            'call' => 'required',
            'mc'   => 'required',
            'dot' => 'required',
            'location' => 'required',
            'facebook_link'   => 'required',
            'instagram_link' => 'required',
            'telegram_link' => 'required',
            'linkedin_link'   => 'required',
            'twitter_link'   => 'required',
            'youtube_link'   => 'required',
            'copyright_name'   => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $rasmUrl = public_path('/' . Contact::find($id)->logo);

        if (File::exists($rasmUrl)) {
            File::delete($rasmUrl);
        }

        $rasmNomi = "";

        if ($request->hasFile('logo')) {
            $rasm = $request->file('logo');

            // Rasm nomini generatsiya qilish
            $rasmNomi = 'logo-'.time().'.'.$rasm->getClientOriginalExtension();

            // Rasmni saqlash
            $rasm->move(public_path('/'), $rasmNomi);
        }

        $contact = Contact::find($id);
        $contact->logo = $rasmNomi;
        $contact->desc = $request->desc;
        $contact->call = $request->call;
        $contact->mc   = $request->mc;
        $contact->dot = $request->dot;
        $contact->location = $request->location;
        $contact->facebook_link   = $request->facebook_link;
        $contact->instagram_link = $request->instagram_link;
        $contact->telegram_link = $request->telegram_link;
        $contact->linkedin_link   = $request->linkedin_link;
        $contact->twitter_link   = $request->twitter_link;
        $contact->youtube_link   = $request->youtube_link;
        $contact->copyright_name   = $request->copyright_name;

        $contact->save();

        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
