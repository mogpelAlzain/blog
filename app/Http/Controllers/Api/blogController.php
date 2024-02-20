<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return response()->json($request, 200);
        // $blog =  DB::table('blog')->get();
            $lang = $request->lang;
            if($lang === 'en'){
                $blog = Blog::select('en_title','en_content','thumbnail','user_id','category_id')->with('comments','category')->paginate(15);
                $data = [
                    'blog' => $blog,
                    'status' => 'success',
                ];
        
                return response()->json($data, 200);
        
            }
            if($lang === 'ar'){
                $blog = Blog::select('ar_title','ar_content','thumbnail','user_id','category_id')->with('comments','category')->paginate(15);
                $data = [
                    'blog' => $blog,
                    'status' => 'success',
                ];
        
                return response()->json($data, 200);
        
            }
            // $blog = Blog::with('comments','category')->paginate(15);
            

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        $blog = Blog::create($data);
       

        return response(new BlogResource($blog), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::find($id)->with('comments','category')->get();
        $data = [
        'blog' => $blog,
        'status' => 'success',
    ];

    return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
