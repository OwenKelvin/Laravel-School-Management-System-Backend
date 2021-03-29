<?php

use Okotieno\StudyMaterials\Controllers\StudyMaterialController;
use Okotieno\StudyMaterials\Controllers\StudyMaterialFilesController;

Route::middleware(['auth:api', 'bindings'])->group(function () {

  Route::resource('/api/study-materials/document-uploads', StudyMaterialFilesController::class);
  Route::resource('/api/study-materials', StudyMaterialController::class);

});
