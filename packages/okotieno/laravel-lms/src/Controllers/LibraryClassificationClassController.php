<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 1/20/2020
 * Time: 10:07 PM
 */

namespace Okotieno\LMS\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\LMS\Models\LibraryClass;
use Okotieno\LMS\Models\LibraryClassification;

class LibraryClassificationClassController extends Controller
{
    public function index(Request $request, LibraryClassification $libraryClassification)
    {
        if($request->flat) {
            return $libraryClassification
                ->libraryClasses()
                ->whereNull('library_class_id')->get();
        }
        if($request->library_class) {
            return LibraryClass::find($request->library_class)
                ->libraryClasses;
        }
    }
}
