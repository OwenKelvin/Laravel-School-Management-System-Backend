<?php

namespace Okotieno\AcademicYear\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Okotieno\AcademicYear\Requests\CreateAcademicYearRequest;

class AcademicYear extends Model
{
    public $timestamps = false;
    protected $fillable=['name', 'start_date', 'end_date'];

    public static function createAcademicYear(CreateAcademicYearRequest $request)
    {
        $academicYear = self::create([
            'name' => $request->name,
            'start_date' => Carbon::createFromDate($request->start_date),
            'end_date' => Carbon::createFromDate($request->end_date)
        ]);

        return $academicYear;
    }
    public function updateAcademicYear(CreateAcademicYearRequest $request)
    {
        $this->name = $request->name;
        $this->start_date = $request->start_date;
        $this->end_date = $request->end_date;
        $this->save();
    }
}
