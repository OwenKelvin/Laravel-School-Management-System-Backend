<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 3/7/2020
 * Time: 7:00 PM
 */

namespace Okotieno\StudyMaterials\Traits;


use Okotieno\StudyMaterials\Models\StudyMaterial;


trait hasStudyMaterial
{
    public function studyMaterialRelation() {

        return $this->belongsTo(StudyMaterial::class);
    }
}
