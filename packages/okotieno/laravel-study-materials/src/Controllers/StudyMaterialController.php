<?php

namespace Okotieno\StudyMaterials\Controllers;

use App\Http\Controllers\Controller;
use Okotieno\StudyMaterials\Models\StudyMaterial;
use Okotieno\StudyMaterials\Models\StudyMaterialDoc;
use Okotieno\StudyMaterials\Requests\CreateStudyMaterialRequest;

class StudyMaterialController extends Controller
{
    public function index() {
        return StudyMaterial::all();
    }

    public function show(StudyMaterial $studyMaterial) {
        return $studyMaterial;
    }

    public function store(CreateStudyMaterialRequest $request)
    {
        $saved_item = StudyMaterialDoc::find($request->docId)
            ->studyMaterial()->create([
                'title' => $request->title,
                'study_material_doc_id' => $request->docId
            ]);
        return [
          'saved' => true,
          'message' => 'Study Material Successfully saved',
          'data' => $saved_item
        ];
    }
}
