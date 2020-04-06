<?php

namespace Okotieno\LMS\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProfilePic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Okotieno\LMS\Models\LibraryBookPublisher;
use Okotieno\LMS\Request\StoreLibraryBookPublisherRequest;

class LibraryBookPublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('okotieno.lms.books.add_books');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLibraryBookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibraryBookPublisherRequest $request)
    {

        if ($request->profilePicture !== null) {
            $filePath = Storage::put('uploads/library_publishers', $request->profilePicture);
            $saved_picture = User::find(auth()->id())->uploadFileDocument()->create([
                'name' => $request->profilePicture->getClientOriginalName(),
                'type' => $request->profilePicture->getClientOriginalExtension(),
                'extension' => $request->profilePicture->getClientOriginalExtension(),
                'mme_type' => $request->profilePicture->getMimeType(),
                'size' => $request->profilePicture->getSize(),
                'file_path' => $filePath
            ]);

        }
        $createdPublisher = LibraryBookPublisher::create([
            'name' => $request->name,
            'biography' => $request->biography
        ]);



        if ($saved_picture != null) {
            $profilePic = ProfilePic::create([
                'file_document_id' => $saved_picture->id,
                'user_id' => $createdPublisher->id
            ]);
            $createdPublisher->profilePics()->save($profilePic);
        }
        return response()->json([
            'saved' => true,
            'message' => 'Publisher saved Successfully',
            'data' => $createdPublisher
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param LibraryBookPublisher $libraryBookPublisher
     * @return \Illuminate\Http\Response
     */
    public function show(LibraryBookPublisher $libraryBookPublisher)
    {
        return response()->json($libraryBookPublisher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param LibraryBookPublisher $libraryBookPublisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LibraryBookPublisher $libraryBookPublisher)
    {

        $libraryBookPublisher->update(['name' => $request->name, 'biography' => $request->biography]);
        return response()->json([
            'saved' => true,
            'message' => 'Publisher Updated Successfully',
            'data' => LibraryBookPublisher::find($libraryBookPublisher->id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LibraryBookPublisher $libraryBookPublisher
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(LibraryBookPublisher $libraryBookPublisher)
    {
        $libraryBookPublisher->delete();
        return response()->json([
            'saved' => true,
            'message' => 'Publisher Updated Successfully',
        ]);
    }
}
