<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{

    public function index()
    {
        $photos = Photo::orderBy('id', 'desc')->paginate(10);

        return view('admin.medias.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.medias.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['path' => $name]);

        session()->flash('photo_uploaded', 'Photo has been uploaded');

        return redirect('admin/medias');
    }

    public function destroy($id)
    {
        //
    }

    public function deleteMedia(Request $request) {

        if(isset($request->delete_single)) {
            $photo = Photo::findOrFail($request->delete_single);
            unlink(public_path() . $photo->path);
            $photo->delete();

            session()->flash('photo_deleted', 'Photo has been deleted');

            return redirect('/admin/medias');
        }

        if(isset($request->delete_selected)) {

            if($request->checkBoxArray == null) {
                return redirect()->back();
            }

            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo) {
                unlink(public_path() . $photo->path);
                $photo->delete();
            }

            session()->flash('selected_deleted', 'Selected photos have been deleted');

            return redirect('/admin/medias');
        }
    }
}