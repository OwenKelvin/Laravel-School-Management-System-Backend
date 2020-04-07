<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 9/13/2019
 * Time: 10:15 PM
 */

namespace Okotieno\StudentAdmissions\Models;


use App\Traits\AppUser;
use Illuminate\Database\Eloquent\Model;
use Okotieno\GuardianAdmissions\Traits\hasGuardians;
use Okotieno\SchoolAccounts\Traits\paysFees;
use Okotieno\SchoolCurriculum\traits\takesCourses;
use Okotieno\Students\Traits\unitAllocated;

class Student extends Model
{
    use AppUser, hasGuardians, takesCourses, unitAllocated, paysFees;
    protected $fillable = ['student_school_id_number'];
    public static function generateIdNumber()
    {
        return self::count() + 1;
    }
}
