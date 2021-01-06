<?php
namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageService {

    public function all() {
        $images = DB::table('images')->get()->all();
        return $images;

    }

    public function getOneById($id) {
        return DB::table('images')->where('id', $id)->first();
    }

    public function edit($id) {
        return DB::table('images')->select()->where('id', $id)->first();
    }

    public function addOne($request) {
        $image = $request->file('image');
        if(!empty($image)) {
            $filename = $image->store('img');
            DB::table('images')->insert(
                ['image' => $filename, 'created_at' => Carbon::now()]
            );
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $request) {
        if($request->hasFile('image')) {
            $filename = $this->getOneById($id);
            Storage::delete($filename->image);
            $newFilename = $request->image->store('img');

            DB::table('images')->where('id', $id)->update(['image' => $newFilename, 'updated_at' => Carbon::now()]);

            return true;
        } else {
            return false;
        }
    }

    public function del($id) {
        $image = DB::table('images')->where('id', $id)->value('image');

        if(!empty($image)) {
            Storage::delete($image);
            DB::table('images')->where('id', $id)->delete();
        }
    }
}