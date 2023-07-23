<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Gate;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Image::class, 'image');
        $this->middleware(['auth']);
        // $this->authorizeResource(Image::class);
    }
    public function index()
    {
        $images = Image::visibleFor(request()->user())->latest()->paginate(15)->withQueryString();
        // $images = request()->user()->images()->published()->latest()->paginate(15)->withQueryString();
        // $images = Image::latest()->paginate(15);

        return view('image.index', compact('images'));
    }

    // public function show(Image $image)
    // {
    //     return view('image.show', compact('image'));
    // }

    public function create()
    {
        return view("image.create");
    }

    public function store(ImageRequest $request)
    {
        // dd($request->all());
        Image::create($request->getData());
        // return redirect()->route('images.index')->with('message', "Image has been uploaded successfully");
        return to_route('images.index')->with('message', "Image has been uploaded successfully");
    }

    public function edit(Image $image)
    {
        // if (!Gate::allows('update-image', $image)) {
        //     abort(403, "Access denied");
        // }
        // Gate::authorize('update-image', $image);
        // $this->authorize('update', $image);
        // if (request()->user()->cannot('update', $image)) {
        //     abort(403, "Access denied");
        // }

        return view("image.edit", compact('image'));
    }

    public function update(Image $image, ImageRequest $request)
    {
        // $this->authorize('update', $image);

        $image->update($request->getData());
        return to_route('images.index')->with('message', "Image has been updated successfully");
    }

    public function destroy(Image $image)
    {
        // if (Gate::denies('delete-image', $image)) {
        //     abort(403, "Access denied");
        // }
        // $this->authorize('delete', $image);

        $image->delete();
        return to_route('images.index')->with('message', "Image has been removed successfully");
    }
}