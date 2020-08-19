<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/time-table/time-table-timing-templates', 'Okotieno\\TimeTable\\Controllers\\TimingsTemplateController');
    Route::resource('/api/time-table/week-days', 'Okotieno\\TimeTable\\Controllers\\WeekDaysController');
    Route::resource('/api/academic-year/{academicYear}/time-tables', 'Okotieno\\TimeTable\\Controllers\\AcademicYearTimeTableController');
    Route::resource(
        '/api/academic-year/{academicYear}/time-tables/{timeTable}/lessons',
        'Okotieno\\TimeTable\\Controllers\\TimeTableLessonsController');
    Route::resource(
        '/api/academic-year/{academicYear}/time-tables/{timeTable}/timings',
        'Okotieno\\TimeTable\\Controllers\\TimeTableTimingsController');
});
