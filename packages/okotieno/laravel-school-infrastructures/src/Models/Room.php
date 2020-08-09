<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 2/11/2020
 * Time: 7:01 PM
 */

namespace Okotieno\SchoolInfrastructure\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Okotieno\SchoolCurriculum\UnitLevel;

class Room extends Model
{
    use softDeletes;
    protected $fillable = [
        'name'
    ];

}
