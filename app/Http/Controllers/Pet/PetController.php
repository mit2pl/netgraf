<?php

namespace App\Http\Controllers\Pet;

use App\Http\Requests\Pet\PetRequest;
use App\Http\Requests\Pet\UploadImageRequest;
use App\Models\ApiResponse;
use App\Models\Category;
use App\Models\Pet;
use App\Models\Tag;
use Illuminate\Http\Request;

class PetController
{
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("pet.index")->with('category', $categories)->with('tag', $tags);
    }

    public function store(PetRequest $request)
    {
        Pet::create([
            'name' => $request->get('name'),
            'tag_id' => $request->get('tag_id'),
            'category_id' => $request->get("category_id"),
            'status' => $request->get('status')
        ]);
        ApiResponse::create([
            'code' => '200',
            'type' => 'unknown',
            'message' => 'Pet was added'
        ]);
        return redirect()->route('pet.index')->with('success', 'Pet was added');
    }

    public function show($pet)
    {
        $show_pet = Pet::where('id', $pet)->first();
        $categories = Category::all();
        $tags = Tag::all();
        return view("pet.show")->with('pet', $show_pet)->with('category', $categories)->with('tag', $tags);
    }
    public function update(PetRequest $request)
    {
        Pet::where('id', $request->get('id'))
            ->update([
                'name' => $request->get('name'),
                'category_id' => $request->get('category_id'),
                'tag_id' => $request->get('tag_id'),
                'status' => $request->get('status')
            ]);
        ApiResponse::create([
            'code' => '200',
            'type' => 'unknown',
            'message' => 'Pet was deleted'
        ]);
        return redirect()->route('pet.show', $request->id)->with('success', 'Pet was updated');
    }

    public function destroy(string $id)
    {
        $pet_info = Pet::where('id', $id)->first();
        if(!empty($pet_info))
        {
            $pet_info->delete();
            ApiResponse::create([
                'code' => '200',
                'type' => 'unknown',
                'message' => 'Pet was deleted'
            ]);
            return redirect()->route("index")->with('success', 'Pet was deleted');
        }else {
            ApiResponse::create([
                'code' => '404',
                'type' => 'unknown',
                'message' => 'pet not found'
            ]);
            return redirect()->route("index")->with('errors', 'such pet does not exist');
        }
    }

    public function showUploadImage($id)
    {
        $pet_info = Pet::where("id", $id)->first();
        return view("pet.show_upload_image")->with("pet", $pet_info);
    }

    public function uploadImage(UploadImageRequest $request)
    {
        $pet_info = Pet::where("id", $request->get('id'))->first();
        if(!empty($pet_info))
        {
            if($pet_info->photo_urls)
            {
                \Storage::delete($pet_info->photo_urls);
            }
            $upload_image = \Storage::put('/media/images/pet', $request->file('photo'));
            Pet::where('id', $request->get("id"))
                ->update([
                    'photo_urls' => $upload_image
                ]);
            ApiResponse::create([
                'code' => '200',
                'type' => 'unknown',
                'message' => 'Image was uploaded'
            ]);
            return redirect()->route("pet.show-upload-image", $request->get('id'))->with('success', 'Image was added');
        } else {
            ApiResponse::create([
                'code' => '404',
                'type' => 'unknown',
                'message' => 'pet not found'
            ]);
            return redirect()->route("index")->with('errors', 'such pet does not exist');
        }
    }

    public function findByStatus(Request $request)
    {
        if(!empty($request->get("status")))
        {
            $show_status = Pet::where("status", $request->get('status'))->get();
        }else {
            $show_status = "";
        }
        return view("pet.status")->with("pet", $show_status);
    }
}
