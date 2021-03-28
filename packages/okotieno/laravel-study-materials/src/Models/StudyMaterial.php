<?php

namespace Okotieno\StudyMaterials\Models;

use Illuminate\Database\Eloquent\Model;

class StudyMaterial extends Model
{
    protected $hidden = ['study_material_doc'];
    protected $appends = ['file_document_info'];
    protected $fillable = [
        'title',
        'study_material_doc_id',
        'public',
        'active'
    ];
    public function studyMaterialDoc () {
        return $this->BelongsTo(StudyMaterialDoc::class);
    }
    public function getFileDocumentInfoAttribute() {
        return  $this->studyMaterialDoc;
    }
}
