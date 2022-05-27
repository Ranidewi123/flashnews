<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::whereUserId(Auth::user()->id)->latest()->paginate(10);

        return view('news.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('news.create', $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title'         => 'required|max:255',
            'category_id'   => 'required',
            'description'   => 'required',
            'image'         => 'image|required|file|max:1024'
        ]);

        if ($request->file('image'))
        {
            $validateData['image'] = $request->file('image')->store('articles');
        }

        $validateData['user_id'] = auth()->user()->id;

        if (Article::create($validateData))
        {
            return redirect()->route('news.index')->with('success', 'New article has been added!');
        }
        return redirect()->back()->with('error', 'Failed add article!');
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
        if (Article::destroy($id))
        {
            return redirect()->route('news.index')->with('success', 'Article has been deleted!');
        }
        return redirect()->back()->with('error', 'Failed delete article!');
    }
}
