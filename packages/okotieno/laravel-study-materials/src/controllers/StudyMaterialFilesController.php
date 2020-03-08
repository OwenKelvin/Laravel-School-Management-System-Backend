<?php

namespace Okotieno\StudyMaterials\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Okotieno\StudyMaterials\Request\CreateStudyMaterialDocRequest;

class StudyMaterialFilesController extends Controller
{
    public function index(Request $request)
    {
        return Storage::download($request->file_path);
        return [$request->file_path];
    }

    public function store(CreateStudyMaterialDocRequest $request)
    {

        if ($request->pdfFile !== null) {
            $filePath = Storage::put('uploads/study-materials', $request->pdfFile);
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
