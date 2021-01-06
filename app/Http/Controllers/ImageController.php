<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $images;

    public function __construct(ImageService $imageService) {
        $this->images = $imageService;
    }

    function index() {
        return view('home', ['images' => $this->images->all()]);
    }

    function create() {
        return view('create');
    }

    function edit($id) {
        $image = $this->images->getOneById($id);
        return view('edit', ['image' => $image]);
    }

    function show($id) {
        $image = $this->images->getOneById($id);
        return view('show', ['image' => $image]);
    }

    function store(Request $request) {
        if($this->images->addOne($request)) {
            return redirect('/');
        } else {
            echo 'We have error!';
        }
    }

    function update($id, Request $request) {
        if ($this->images->update($id, $request)) {
            return redirect('/edit/'. $id);
        } else {
            echo 'Field file empty!';
        }
    }

    function delete($id) {
        $this->images->del($id);
        return redirect('/');
    }
}
