<?php

namespace App\Http\Controllers;

use App\Models\CoverPhoto;
use App\Models\ProfilePicture;
use Illuminate\Http\Request;
use App\Models\TalkingInfo;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class ProfileCover extends Controller
{

    public function storeProfile(Request $request, $id){


        $this->validate($request, [
            'file' => 'mimes:jpeg,jpg,png,bmp,tiff |max:4096',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, jpg, png, bmp,tiff are allowed.'
            ]
        );

        $profileImageById = New ProfilePicture();
        $profileImage = $request->file('file');
        $name =time()."_".Auth::user()->id."_". $profileImage->getClientOriginalName();
        $uploadPath = ('public/images/profile/'.$id.'/');
        $profileImage->move($uploadPath, $name);
        $imageUrl = $uploadPath . $name;

        $profileImageById->file=$imageUrl;
        $profileImageById->userId=$request->userId;
        $profileImageById->save();


        return response()->json($profileImageById, 200);
    }
    public function storeCover(Request $request, $id){

        $this->validate($request, [
            'coverPhoto' => 'mimes:jpeg,jpg,png,bmp,tiff |max:4096',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, jpg, png, bmp,tiff are allowed.'
            ]
        );

        $coverPhotoById = New CoverPhoto();
        $coverPhoto = $request->file('coverPhoto');
        $name =time()."_".Auth::user()->id."_". $coverPhoto->getClientOriginalName();
        $uploadPath = ('public/images/coverPhoto/'.$id.'/');
        $coverPhoto->move($uploadPath, $name);
        $imageUrl = $uploadPath . $name;

        $coverPhotoById->coverPhoto=$imageUrl;
        $coverPhotoById->userId=$request->userId;
        $coverPhotoById->save();

        return response()->json($coverPhotoById, 200);
    }

}
