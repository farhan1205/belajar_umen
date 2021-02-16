<?php

namespace App\Repositories\CategoryRepository;

use Illuminate\Http\Client\Request;

interface iCategoryRepository
{
    public function getCategories($request);
    public function getCategoryDetail($id);
    public function setCategory($request);
    public function setCategoryUpdate($id, $request);
    public function deleteCategory($id);

}
