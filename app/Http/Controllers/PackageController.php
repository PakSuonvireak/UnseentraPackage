<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Destination;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $packages = Package::all();

        return view('package.index', compact('packages', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'create';
        $destinations = \App\Destination::all();

        return view('package.create', compact('destinations', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required',
            'slug'  =>  'unique:packages,slug',
            'tags'  =>  'nullable',
            'excerpt'   =>  'required',
            'description'   =>  'required',
        ]);

        $user = auth()->user();

        $packages = new \App\Package();
        $packages->author_id = $user->id;
        $packages->title = $request->input("title");
        $packages->slug = $request->input("slug");
        $packages->tags = $request->input("tags");
        $packages->excerpt = $request->input("excerpt");
        $packages->body = $request->input("description");
        $packages->destination_id =  $request->input("destination"); 
        $packages->save();

        return redirect('/package')->with('message', "Package has been Added successful!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $packages = Package::findOrFail($id);
        $itineraries = $packages->itineraries;
        $first_id = $itineraries->first();
        $count_row = $itineraries->count();

        return view('package.package', compact('packages', 'user', 'itineraries', 'first_id', 'count_row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'edit';
        $package = Package::findOrFail($id);
        $destinations = \App\Destination::all();

        return view('package.create', compact('destinations','package', 'action'));
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
        $package = Package::findOrFail($id);

        $package->title = $request->input("title");
        $package->slug = $request->input("slug");
        $package->tags = $request->input("tags");
        $package->excerpt = $request->input("excerpt");
        $package->body = $request->input("description");
        $package->destination_id =  $request->input("destination"); 
        $package->save();

        return redirect("package")->with('message', 'Package has been Updated successful !!!');
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
