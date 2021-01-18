<?php

namespace App\Http\Controllers;

use App\Jobs\AddLogo;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */

  public function create(Request $request)
  {
    $uniqueSecret = $request->old(
      'uniqueSecret',
      base_convert(sha1(uniqid(mt_rand())), 16, 36)
    );
    return view('announcements.create', compact('uniqueSecret'));
  }


  public function store(AnnouncementRequest $request)
  {
    //vogliamo un collegamento tra utente loggato e annuncio appena creato 

    $user = Auth::user();

    $announcement = $user->announcements()->create([
      'title' => $request->input('title'),
      'body' => $request->input('body'),
      'price' => $request->input('price'),

      'uniqueSecret' => $request->input('uniqueSecret'),
    ]);
    //Vogliamo un collegamento tra anuncio e categoria usando le relazioni.
    //Di quali entità abbiamo bisogno?
    $category = Category::find($request->input('category'));
    $announcement->category()->associate($category);
    $announcement->save();
    $uniqueSecret = $request->uniqueSecret;

    $images = session()->get("images.{$uniqueSecret}", []);
    $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

    $images = array_diff($images, $removedImages);
    // dd($uniqueSecret);
    foreach ($images as $image) {
      // dd($user->announcements->title);
      $i = new AnnouncementImage();
      $fileName = basename($image);
      $newFileName = "public/announcements/{$user->announcements->last()->id}/{$fileName}";
      Storage::move($image, $newFileName);


      $i->file = $newFileName;
      $i->announcement_id = $user->announcements->last()->id;
      $i->save();

      GoogleVisionSafeSearchImage::withChain([
        new GoogleVisionLabelImage($i->id),
        new GoogleVisionRemoveFaces($i->id),
        new ResizeImage($i->file, 300, 150),
        new ResizeImage($i->file, 300, 300),
        new ResizeImage($i->file, 300, 150),
        new ResizeImage($i->file, 550, 500),
        new ResizeImage($i->file, 600, 600),
      ])->dispatch($i->id);
    }

    File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

    return redirect()->back()->with('message', 'Hai creato un nuovo annuncio');
  }

  public function uploadImage(Request $request)
  {

    $uniqueSecret = $request->input('uniqueSecret');
    $fileName = $request->file('file')->store("/public/temp/{$uniqueSecret}");

    dispatch(new ResizeImage(
      $fileName,
      300,
      150
    ));

    session()->push("images.{$uniqueSecret}", $fileName);
    return response()->json(
      [
        'id' => $fileName,
      ]
    );
  }
  public function removeImage(Request $request)
  {
    $uniqueSecret = $request->input('uniqueSecret');
    $fileName = $request->input('id');
    session()->push("removedimages.{$uniqueSecret}", $fileName);
    Storage::delete($fileName);
    return response()->json('ok');
  }
  public function getImages(Request $request)
  {
    $uniqueSecret = $request->uniqueSecret;

    $images = session()->get("images.{$uniqueSecret}", []);

    $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

    $images = array_diff($images, $removedImages);

    $data = [];

    foreach ($images as $image) {
      $data[] = [
        'id' => $image,
        'src' => AnnouncementImage::getUrlByFilePath($image, 300, 150)
      ];
    }

    return response()->json($data);
  }
  public function edit(Announcement $announcement, Request $request)
  {
    $uniqueSecret = $request->old(
      'uniqueSecret',
      base_convert(sha1(uniqid(mt_rand())), 16, 36)
    );
    return view('announcements.edit', compact('announcement', 'uniqueSecret'));
  }
  public function update(Request $request, Announcement $announcement)
  {
    $user = Auth::user();

    $announcement = $user->announcements()->update([
      'title' => $request->input('title'),
      'body' => $request->input('body'),
      'price' => $request->input('price'),
      'uniqueSecret' => $request->input('uniqueSecret'),
    ]);
    //Vogliamo un collegamento tra anuncio e categoria usando le relazioni.
    //Di quali entità abbiamo bisogno?
    $category = Category::find($request->input('category'));
    $announcement->category()->associate($category);
    $announcement->save();
    $uniqueSecret = $request->uniqueSecret;

    $images = session()->get("images.{$uniqueSecret}", []);
    $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

    $images = array_diff($images, $removedImages);
    // dd($uniqueSecret);
    foreach ($images as $image) {
      // dd($user->announcements->title);
      $i = new AnnouncementImage();
      $fileName = basename($image);
      $newFileName = "public/announcements/{$user->announcements->last()->id}/{$fileName}";
      Storage::move($image, $newFileName);


      $i->file = $newFileName;
      $i->announcement_id = $user->announcements->last()->id;
      $i->save();

      GoogleVisionSafeSearchImage::withChain([
        new GoogleVisionLabelImage($i->id),
        new GoogleVisionRemoveFaces($i->id),
        new ResizeImage($i->file, 300, 150),
        new ResizeImage($i->file, 300, 300),
        new ResizeImage($i->file, 300, 150),
        new ResizeImage($i->file, 550, 500),
        new ResizeImage($i->file, 600, 600),
      ])->dispatch($i->id);
    }

    File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

    return redirect()->back()->with('message', 'Hai creato un nuovo annuncio');
  }
  public function index()
  {
    $announcements = Announcement::all();
    return view('announcements.all', compact('announcements'));
  }
}
