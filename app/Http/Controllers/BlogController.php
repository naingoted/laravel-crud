<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view("blog.index", compact("blogs"));
    }
    /**
     * Out put data in Datatables format
     */
    public function data()
    {   
        return Datatables::of(Blog::query())->make(true);
    }
    /**
     * Show data in datatable
     */
    public function datatable()
    {
        return view("blog.datatable");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("blog.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // frontend validation
        $this->validate($request, [
            'title' => 'bail|required|unique:blogs',
            'body'  => 'required'
            ]);
        // mass assignment , insert current logged in user's id
        Blog::create(['title' => $request->input('title'),
                        'body'  => $request->input('body'),
                        'user_id'   => Auth::id()
            ]);

        return redirect()->route("blogs.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.show', compact("blog"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $blog = Blog::findOrFail($id);
        return view("blog.edit", compact('blog'));
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
        Blog::findOrFail($id)->update($request->all());
        return $this->index('status', 'Successfully updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect()->route("blogs.index");
    }
}
