<?php

namespace App\Http\Controllers\Frontend;

use Artesaos\SEOTools\Facades\SEOMeta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Page;

class BlogController extends Controller
{
    public function index() {
        try {
            $records = Page::with([
                'media' => function($query) {}
            ])->orderBy('id','desc')
            ->paginate(4);
            SEOMeta::setTitle('Blog');
            SEOMeta::setDescription('Tin tức của store mobile');
            SEOMeta::setCanonical('https://storemobile.xyz');
            return view('frontend.blog.blogs')->with([
                'records' => $records
            ]);
        }catch(\Exception $e) {
            abort(404);
        }
    }

// tìm tin tức 
    public function find(Request $request) {
        try {
            $records = Page::where('title', 'like', $request->search)->with('media')->paginate(8);
            return view('frontend.blog.blogs')->with([
                'records' => $records
            ]);
        }catch(\Exception $e) {
            abort(404);
        }
    }
    //end tim tin tức 
    
}
