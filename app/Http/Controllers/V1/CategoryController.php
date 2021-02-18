<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository\iCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryRepo;

    public function __construct(iCategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $categories = $this->categoryRepo->getCategories($request);

        return response()->json([
            "data" => $categories
        ]);
    }

    public function detail($id)
    {
        $categories = $this->categoryRepo->getCategoryDetail($id);

        return response()->json([
            "data" => $categories
        ]);
    }

    public function input(Request $request)
    {
        $data = $this->categoryRepo->setCategory($request);

        return response()->json([
            'message' => 'data berhasil masuk',
            'data' =>$data
        ], 201);
    }

    public function update($id, Request $request)
    {
        $data = $this->categoryRepo->setCategoryUpdate($id, $request);

        return response()->json([
            'data' => $data
        ]);
    }

    public function deleteData($id)
    {
        $data = $this->categoryRepo->deleteCategory($id);
    }
}
