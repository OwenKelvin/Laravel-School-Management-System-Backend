<?php

namespace Okotieno\TeacherAdmissions\Traits;


use Okotieno\Teachers\Models\Teacher;

trait canBeATeacher {
    public function makeTeacher() {
        $this->teacher()->create([]);
        $this->assignRole('teacher');
    }
    public function teacher() {
        return $this->hasOne(Teacher::class);
    }
}
