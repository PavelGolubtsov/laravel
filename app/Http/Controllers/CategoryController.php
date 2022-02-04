<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function prodyct (Category $category)
    {
        $category = Category::get();
        return view('product', ['category' => $category]);
    }

    public function category (Category $category)
    {
        
        return view('category', compact('category'));
    }

    public function home ()
    {
        $categories = Category::get();
        $data = [
            'categories' => $categories,
            'title' => 'Главная',
        ];
        return view('home', $data);
    }

    public function test ($id)
    {
        $category = Category::get();
        return view('test', ['category' => $category, 'id' => $id]);
    }
}
