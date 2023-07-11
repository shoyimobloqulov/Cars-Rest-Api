<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transport = Transport::first();
        $array = [
            "image_url" => asset('transport-image'),
            'success'   => 1,
            'data'      => [
                'desc'  => $transport->desc,
                'title' => $transport->title,
                'row-1' => [
                    'desc'  => $transport->desc1,
                    'title' => $transport->title1,
                    'icon'  => $transport->icon1
                ],
                'row-2' => [
                    'desc'  => $transport->desc2,
                    'title' => $transport->title2,
                    'icon'  => $transport->icon2
                ],
                'row-3' => [
                    'desc'  => $transport->desc3,
                    'title' => $transport->title3,
                    'icon'  => $transport->icon3
                ],
                'row-4' => [
                    'desc'  => $transport->desc4,
                    'title' => $transport->title4,
                    'icon'  => $transport->icon4
                ]
            ]
        ];
        return response()->json($array);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
