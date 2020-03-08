<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::resource('/api/study-materials/document-uploads', 'Okotieno\\StudyMaterials\\Controllers\\StudyMaterialFilesController');
    Route::resource('/api/study-materials', 'Okotieno\\StudyMaterials\\Controllers\\StudyMaterialController');

});
