<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 9/13/2019
 * Time: 10:15 PM
 */

namespace Okotieno\StudentAdmissions\Models;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['student_school_id_number'];
    public static function generateIdNumber()
    {
        return self::count() + 1;
    }
}
