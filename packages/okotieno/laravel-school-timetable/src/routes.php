<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/time-table/time-table-timing-templates', 'Okotieno\\TimeTable\\Controllers\\TimingsTemplateController');

});
