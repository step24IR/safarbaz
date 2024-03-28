<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomImageController extends Controller
{
    public function store($images , $room)
    {
        $imageNames = null;
        foreach ($images as $image) {
            $imageName = generateFileName($image->getClientOriginalName());
            $image->move(public_path(env('ROOM_IMAGES_UPLOAD_PATH')), $imageName);
            $imageNames[] = $imageName;
        }

        foreach ($imageNames as $imageName) {
            RoomImage::create([
                'room_id' => $room->id,
                'image' => $imageName,
            ]);
        }
    }

    public function edit(Room $room)
    {
        return view('admin.room.edit_image' , compact('room'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'add_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName = generateFileName($request->add_image->getClientOriginalName());
        $request->add_image->move(public_path(env('ROOM_IMAGES_UPLOAD_PATH')),$fileName);
        $room = Room::findOrFail($request->room_id);
        $room->images()->create([
            'image' => $fileName,
        ]);
        return back();
    }


    public function destroy(Request $request)
    {
        $image = RoomImage::find($request->image_id);

        if(File::exists(public_path(env('ROOM_IMAGES_UPLOAD_PATH')).$image->image)){
            File::delete(public_path(env('ROOM_IMAGES_UPLOAD_PATH')).$image->image);
        }

        $image->delete();
        return back();
    }
}
