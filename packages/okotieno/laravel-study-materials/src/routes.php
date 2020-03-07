<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::resource('/api/study-materials/document-uploads', 'Okotieno\\StudyMaterials\\Controllers\\StudyMaterialFilesController');

});
