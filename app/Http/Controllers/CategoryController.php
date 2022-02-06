<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{

    public function category (Category $category)
    {
        $products = session('products');
        return view('category', compact('category', 'products'));
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

}
