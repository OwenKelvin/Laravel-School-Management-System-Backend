<?php

namespace Okotieno\StudyMaterials\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudyMaterialFilesController extends Controller
{
    public function store(Request $request) {

        if ($request->pdfFile !== null) {
            $filePath = Storage::put('uploads/study-materials', $request->pdfFile);

//            return [
//                'name' => $request->file->getClientOriginalName(),
//                'type' => $request->file->getClientOriginalExtension(),
//                'extension' =>  $request->file->getClientOriginalExtension(),
//                'mme_type' => $request->file->getMimeType(),
//                'size' => $request->file->getSize(),
//                'file_path' => $filePath
//            ];
            $saved_content = User::find(auth()->id())->uploadStudyMaterial()->create([
                'name' => $request->pdfFile->getClientOriginalName(),
                'type' => $request->pdfFile->getClientOriginalExtension(),
                'extension' => $request->pdfFile->getClientOriginalExtension(),
                'mme_type' => $request->pdfFile->getMimeType(),
                'size' => $request->pdfFile->getSize(),
                'file_path' => $filePath
            ]);
            return response([
                'saved' => true,
                'message' => 'The Upload was successful',
                'data' => $saved_content
            ]);
        }
    }
}
