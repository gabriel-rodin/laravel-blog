<?php

namespace App\Http\Controllers;

use App\User;
use App\Blog;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $categories;

    function __construct() {
        $this->categories = Category::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['blogs'] = Blog::getAll($request);
        $data['categories'] = $this->categories;
        if(!!$request->cat){
            $data['label'] = $data['blogs']->total() > 0 ? $data['blogs'][0]->category->name : null;
        }
        return view('blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = $this->categories;
        return view('blog.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:6',
            'category' => 'required',
            'description' => 'required|min:6',
        ]);
        Blog::manageData($request,null);
        return back()->with('status', 'Blog has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['blog'] = Blog::getData($id);
        $data['categories'] = $this->categories;
        return view('blog.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['blog'] = Blog::getData($id);
        $data['categories'] = $this->categories;
        return view('blog.edit',$data);
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
        $request->validate([
            'title' => 'required|min:6',
            'category' => 'required',
            'description' => 'required|min:6',
        ]);
        Blog::manageData($request,$id);
        return back()->with('status', 'Blog has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::deleteData($id);
        return response()->json(['result'=>$data]);
    }

    public function getUserBlogs(Request $request, $id)
    {
        $data['user'] = User::find($id);
        $data['blogs'] = Blog::getAll($request,$id);
        $data['categories'] = $this->categories;
        if(!!$request->cat){
            $data['label'] = $data['blogs']->total() > 0 ? $data['blogs'][0]->category->name : null;
        }
        return view('blog.user-blogs',$data);
    }

    public function getUsers()
    {
        $data['users'] = User::with('posts')->get();
        return view('blog.users',$data);
    }

}
