<?php

namespace App\Repositories\CategoryRepository;

use App\Models\Category;
use App\Repositories\CategoryRepository\iCategoryRepository;
use Illuminate\Http\Request;

Class CategoryRepository implements iCategoryRepository{

     public function getCategories($request)
    {
        // $categories = Category::all();
        // return $categories;

        $categories = new Category;
        $code = isset($request->code) ? $request->code : null;
        if ($code != null ) {
            $categories = $categories->where('code', $code);
        }
        $categories = $categories->get();
        return $categories;
    }

    public function getCategoryDetail($id)
    {
        $categories = Category::find($id);
        $categories = isset($categories->id) ? $categories : "Not Found";
        return response()->json([
            "data" => $categories
        ]);
        // $categories = new Category;
        // $id = isset($id->id) ? $id->id : null;
        // if ($id != null ) {
        //     $categories = $categories->where('id', $id);
        // }
        // $categories = $categories->get();
        // return $categories;

    }

    public function setCategory($request)
    {
        $categories = new Category();
        $categories->code = $request->code;
        $categories->name = $request->name;
        $categories->save();
        return $categories;

    }

    public function setCategoryUpdate($id, $request)
    {
        $data = Category::find($id);
        // dd($data);
        $data->code = $request->code;
        $data->name = $request->name;
        $data->save();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil Dihapus'

        ]);

    }

    public function deleteCategory($id)
    {
        $data = Category::where('id', $id);

        $deleteData = $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Data terhapus'

        ]);
    }


}
