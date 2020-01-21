<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.view-quotes',['quotes' => Quote::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.add-quote');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required','unique:quotes,name'],
            'quote' => ['required','string'],
            'image' => ['required','mimes:png,jpg,jpeg','max:80']
        ],[
            'image.uploaded' => 'fail to upload your image,  image maximum size is 80kb'
        ]);

        $uploadedFile = $request->image;
        $fileName =  str_slug($request->name).'.'.$uploadedFile->getClientOriginalExtension();
        $uploadedFile->storePubliclyAs('public/quotes',$fileName);

        Quote::create([
            'name' => $request->name,
            'quote' => $request->quote,
            'image' => $fileName
        ]);

        return back()->with([
            'message' => 'quote created successfully',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $filePath = 'public/quotes/'.$quote->image;
        if(Storage::exists($filePath)){
            Storage::delete($filePath);
        }

        $quote->delete();

        return back()->with([
            'message' => 'quote deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
