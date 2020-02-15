<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 2/10/2020
 * Time: 10:29 PM
 */

namespace Okotieno\SchoolExams\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Okotieno\SchoolExams\Models\ExamPaper;

class ExamPapersController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $response = [];
        if ($request->self !== null) {
            foreach (User::find(auth()->id())->createdExamPapers as $examPaper) {
                $response[] = [
                    'id' => $examPaper->id,
                    'name' => $examPaper->name,
                    'unit_level_name' => $examPaper->unitLevel->name
                ];
            }

        }
        return response()->json(
            $response
        );
    }

    /**
     * @param ExamPaper $examPaper
     * @return array
     */

    public function show(ExamPaper $examPaper) {
        $examPaper->instructions;
        $examPaper->questions;
        $examPaper->unit_level_name;
        return response()->json($examPaper);
    }
    public function store(Request $request)
    {

        $newPaper = ExamPaper::create([
            'name' => $request->name,
            'unit_level_id' => $request->unitLevel,
            'created_by' => auth()->id()
        ]);
        foreach ($request->instructions as $instruction) {
            $position = null;
            if (key_exists('position', $instruction)) {
                $position = $instruction['position'];
            }
            $newPaper->instructions()->create([
                'description' => $instruction['description'],
                'position' => $position,
            ]);
        }
        return [
            'saved' => true,
            'message' => 'Financial Plan Successfully saved',
            'data' => $newPaper
        ];
    }

    /**
     * @param ExamPaper $examPaper
     * @return array
     * @throws \Exception
     */
    public function destroy(ExamPaper $examPaper)
    {
        $examPaper->delete();
        return [
            'saved' => true,
            'message' => 'Exam Paper Successfully deleted'
        ];
    }
}
