<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
   

    public function index()
    {
        $announcements = Announcement::where('is_accepted', true)
            ->orderBy('created_at', 'desc')->take(6)->get();
        // dd($announcements);
        return view('home', compact('announcements'));
    }
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }
    public function search(Request $request)
    {
        $q = $request->input('q');

        $announcements = Announcement::search($q)->get();
        return view('search_results', compact('q', 'announcements'));
    }
    public function announcementsByCategory($name, $category_id)
    {
        $category = Category::find($category_id);
        $announcements = $category->announcements()
        ->where('is_accepted', true)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
  
        return view('announcements.index', compact('category', 'announcements'));
    }
    function locale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
