<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/time-table/time-table-timing-templates', 'Okotieno\\TimeTable\\Controllers\\TimingsTemplateController');
    Route::resource('/api/academic-year/{academicYearId}/time-tables', 'Okotieno\\TimeTable\\Controllers\\AcademicYearTimeTableController');
});
