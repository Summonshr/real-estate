<?php

namespace App\Http\Controllers;

use App\Http\Requests\Site\CreateSite;
use App\Http\Requests\Site\DeleteSite;
use App\Http\Requests\Site\UpdateSite;
use App\Site;
use Illuminate\Http\Request;

class SiteResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.sites.component',['component'=>'sites']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.sites.new',['site'=>new Site]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSite $request, Site $site)
    {
        $site->fill($request->only(['name','url']));

        $request->user()->sites()->save($site);

        $request->user()->deduct(100);

        return redirect(route('sites.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        return view('app.sites.new', ['site'=>$site]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Site $site)
    {
        return view('app.sites.new',['site'=>$site]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSite $request, Site $site)
    {
        $site->update($request->only(['name','url','theme_id']));

        return redirect(route('sites.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteSite $request, Site $site)
    {
        $site->delete();

        return redirect(route('sites.index'));
    }
}
