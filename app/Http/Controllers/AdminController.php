<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = DB::table("blogs")->paginate(5);
        return view("home", compact('blogs'));
    }

    function blog()
    {
        $blogs = Blog::paginate(10);
        return view("blog", compact('blogs'));
    }

    public function showIndex()
    {
        $blogs = DB::table("blogs")->paginate(5);
        return view("index", compact('blogs'));
    }

    public function blog2()
    {
        $blogs = DB::table("blogs")->paginate(5);
        return view('blog2', compact('blogs'));
    }

    function delete($id)
    {
       Blog::find($id)->delete();
        return redirect()->back();
    }

    public function create()
    {
        return view('insert'); 
    }

    public function insert(Request $request)
    {
        $data = [
            'title'      => $request->title,
            'content'    => $request->content,
            'status'     => $request->status ?? 0,
            'created_at' => now(),
            'updated_at' => now(), 
        ];

        DB::table("blogs")->insert($data);

        // บันทึกเสร็จ ให้เด้งกลับไปหน้าเดิม (ถ้ามี ref) หรือกลับไป blog
        if ($request->has('ref')) {
            $redirectTo = $request->input('ref');
        } else {
            $previousUrl = url()->previous();
            
            if (str_contains($previousUrl, 'author/blog')) {
                $redirectTo = url('/author/blog');
            } else {
                $redirectTo = route('blog2'); 
            }
        }
        return redirect($redirectTo);
    }

    function change($id)
    {
        $blogs = Blog::find($id);

        if ($blogs) {
            $newStatus = $blogs->status == 1 ? 0 : 1;
            DB::table("blogs")->where('id', $id)->update(['status' => $newStatus]);
        }

       return redirect()->back();
    }

    function edit($id)
    {
        $blogs = Blog::find($id);
        return view('edit', compact('blogs')); 
    }

    function update(Request $request, $id)
    {
        $data = [
            'title'   => $request->title,
            'content' => $request->content,
            'status'  => $request->status,
            'updated_at' => now(),
        ];
        
       Blog::find($id)->update($data);

        // อัปเดตเสร็จ ให้เด้งกลับไปหน้าเดิม (ถ้ามี ref) หรือกลับไป blog2
        if ($request->has('ref')) {
            $redirectTo = $request->input('ref');
        } else {
            $previousUrl = url()->previous();
            
            if (str_contains($previousUrl, 'author/blog')) {
                $redirectTo = url('/author/blog');
            } else {
                $redirectTo = route('blog2'); 
            }
        }
        return redirect($redirectTo);
    }

    public function goBack()
    {
        return redirect()->back();
    }
}