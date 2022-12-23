<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function storeImage(Request $request)
    {
        if($request->hasFile('upload')) {
      
            //Upload File
            $media = $request->file('upload')->store('media');
     
            return response()->json([
                'url' => url('/', $media),
            ]);
        }
    }
}
