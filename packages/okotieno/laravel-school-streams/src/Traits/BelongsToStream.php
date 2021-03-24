<?php


namespace Okotieno\SchoolStreams\Traits;


use Okotieno\SchoolStreams\Models\Stream;

trait BelongsToStream
{
    public function streams() {
        return $this->belongsToMany(Stream::class)->withPivot([
            'academic_year_id',
            'class_level_id'
        ]);
    }

    public function updateStream ($user, $streamId, $academicYearId, $classLevelId){
        if ($streamId != null) {
            $stream = $user->student->streams()
                ->wherePivot('academic_year_id', $academicYearId)
                ->wherePivot('class_level_id', $classLevelId);

            if($stream->first() != null) {
                if($stream->first()->id != $streamId) {
                    $stream->detach();
                    $user->student->streams()->save(
                        Stream::find($streamId), [
                            'academic_year_id' => $academicYearId,
                            'class_level_id' => $classLevelId,
                        ]
                    );
                }
            } else {
                $user->student->streams()->save(
                    Stream::find($streamId), [
                        'academic_year_id' => $academicYearId,
                        'class_level_id' => $classLevelId,
                    ]
                );
            }

        }
    }
}
