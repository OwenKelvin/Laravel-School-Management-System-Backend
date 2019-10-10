<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 9/13/2019
 * Time: 10:15 PM
 */

namespace Okotieno\GuardianAdmissions\Models;


use App\Traits\AppUser;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use AppUser;
    protected $fillable = ['guardian_id_number'];
    public static function generateIdNumber()
    {
        return self::count() + 1;
    }
}
