<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileDocumentController extends Controller
{
    public function store(Request $request)
    {
        if ($request->profilePicture !== null) {
            $filePath = Storage::put('uploads/profile_picture', $request->profilePicture);
            $saved_content = User::find(auth()->id())->uploadFileDocument()->create([
                'name' => $request->profilePicture->getClientOriginalName(),
                'type' => $request->profilePicture->getClientOriginalExtension(),
                'extension' => $request->profilePicture->getClientOriginalExtension(),
                'mme_type' => $request->profilePicture->getMimeType(),
                'size' => $request->profilePicture->getSize(),
                'file_path' => $filePath
            ]);
            return response([
                'saved' => true,
                'message' => 'The Upload was successful',
                'data' => $saved_content
            ]);
        }
    }

    public function show($userId) {
//        return User::find($userId)->profilePictures->last()
//            ->fileDocument->file_path;
        $picture = User::find($userId)->profilePictures->last();
        if($picture != null) {
            return Storage::download($picture->fileDocument->file_path);
        }

    }
}
