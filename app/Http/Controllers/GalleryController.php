<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function store(StoreGalleryRequest $request)
    {
        $gallery = new Gallery([
            'title' => $request->title,
            'author_id' => auth()->id()
        ]);

        $uploadedFileUrl = Cloudinary::upload($request->image->getRealPath(), [
            'folder' => 'gallery'
        ])->getSecurePath();
        
        $gallery->image = $uploadedFileUrl;
        $gallery->save();

        $notification = array(
            'messege' => 'Image created successfully',
            'alert-type' => 'success',
            'title' => 'Successful!',
            'button' => 'Thanks, operation successful!',
        );
        
        return redirect()->back()->with($notification);
    }

}
