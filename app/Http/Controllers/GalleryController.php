<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\Gallery;

use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\EditGalleryRequest;
use App\Http\Services\CreateGalleryService;
use App\Http\Services\MediaService;

class GalleryController extends Controller
{
    /**
     * Display all galleries.
     *
     * @return View
     */
    public function index(): View
    {
        return view('manage.index')->with([
            'title' => 'Galleries',
            'type' => 'galleries',
            'galleries' => Gallery::orderBy('created_at', 'asc')->paginate(7)
        ]);
    }

    /**
     * Display form to create
     * a new gallery.
     *
     * @return View
     */
    public function create(): View
    {
        return view('manage.create-edit')->with([
            'title' => 'Create Gallery',
            'task' => 'create',
        ]);
    }

    /**
     * Create a new gallery.
     *
     * @param StoreGalleryRequest $request
     * @param CreateGalleryService $createGalleryService
     * @return RedirectResponse
     */
    public function store(StoreGalleryRequest $request, CreateGalleryService $createGalleryService): RedirectResponse
    {
        // Save new gallery
        Gallery::create($createGalleryService->getRequestItems($request->all()));
        // Redirect user to galleries main page
        return redirect('/manage/galleries')->with([
            'message_success' => 'The gallery successfully created.'
        ]);
    }

    /**
     * Display form to edit a 
     * specific gallery.
     *
     * @param $id
     * @return View
     */
    public function edit($id): View
    {
        // Gallery
        $gallery = Gallery::where(['id' => $id])->firstOrFail();
        return view('manage.create-edit')->with([
            'title' => 'Edit Gallery',
            'task' => 'update',
            'gallery' => $gallery
        ]);
    }

    /**
     * Update a specific gallery.
     *
     * @param EditGalleryRequest $request
     * @return RedirectResponse
     */
    public function update(Request $request, MediaService $mediaService): RedirectResponse
    {
        // Current photos
        $currentPhotos = $request->current_photos ? $request->current_photos : [];
        // Photos to be deleted
        $toDelete = $request->remove;
        // New photos
        $newPhotos = $request->photos;
        // Updated photos
        $updatedPhotos = isset($updatedPhotos) ? $updatedPhotos : $currentPhotos;

        // Remove photo records
        // Remove files from folder
        if ($toDelete) {
            $currentPhotos = $mediaService->removeMultipleFiles($toDelete, $currentPhotos);
        }

        // If there are new photos
        if ($newPhotos) {
            $newPhotos = $mediaService->addPhotos($request->photos);
            // Updated photos
            $updatedPhotos = array_merge($currentPhotos, $newPhotos);
        }

        //Update gallery
        Gallery::where('id', $request->gallery_id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'photos' => $updatedPhotos,
        ]);
        
        // Redirect user to galleries main page
        return redirect('/manage/galleries')->with([
            'message_success' => 'The gallery was successfully updated.'
        ]);
    }

    /**
     * Delete a specific gallery.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id, MediaService $mediaService)
    {
        // Gallery
        $gallery = Gallery::where('id', $id)->firstOrFail();

        // Remove all image files
        // from folder
        $mediaService->removeMultipleFiles($gallery->photos);

        // Delete gallery
        $gallery->delete();

        // Redirect user to galleries main page
        return redirect('/manage/galleries')->with([
            'title' => 'Galleries',
            'galleries' => Gallery::all(),
            'message_success' => 'The gallery was successfully removed.'
        ]);
    }

}
