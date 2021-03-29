<?php

use Okotieno\TimeTable\Controllers\AcademicYearTimeTableController;
use Okotieno\TimeTable\Controllers\TimeTableLessonsController;
use Okotieno\TimeTable\Controllers\TimeTableTimingsController;
use Okotieno\TimeTable\Controllers\TimingsTemplateController;
use Okotieno\TimeTable\Controllers\WeekDaysController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/time-table/time-table-timing-templates', TimingsTemplateController::class);
    Route::resource('/api/time-table/week-days', WeekDaysController::class);
    Route::resource('/api/academic-year/{academicYear}/time-tables', AcademicYearTimeTableController::class);
    Route::resource(
        '/api/academic-year/{academicYear}/time-tables/{timeTable}/lessons',
        TimeTableLessonsController::class);
    Route::resource(
        '/api/academic-year/{academicYear}/time-tables/{timeTable}/timings',
        TimeTableTimingsController::class);
});
