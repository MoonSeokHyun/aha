<?php

namespace App\Http\Controllers;

use App\Models\PublicServiceInfo;
use Illuminate\Http\Request;

class PublicServiceInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicServiceInfos = PublicServiceInfo::paginate(15); // 15개씩 페이징
        return view('PublicService.index', ['publicServiceInfos' => $publicServiceInfos]);
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
     * @param  \App\Models\PublicServiceInfo  $publicServiceInfo
     * @return \Illuminate\Http\Response
     */
    public function show(PublicServiceInfo $publicServiceInfo)
    {
        return view('PublicService.show', ['publicServiceInfo' => $publicServiceInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PublicServiceInfo  $publicServiceInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(PublicServiceInfo $publicServiceInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PublicServiceInfo  $publicServiceInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PublicServiceInfo $publicServiceInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PublicServiceInfo  $publicServiceInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublicServiceInfo $publicServiceInfo)
    {
        //
    }
}
