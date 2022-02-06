<?php

namespace App\Http\Controllers;

use App\Jobs\ExportCategories;
use App\Jobs\ExportProducts;
use App\Jobs\ImportCategories;
use App\Jobs\ImportProducts;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index ()
    {
        $users = User::get();

        return view('admin.home', compact('users'));
    }
    
    public function categoryCreated ()
    {
        return view('admin.categoryCreated');
    }

    public function productCreated ()
    {
        return view('admin.productCreated');
    }

    public function addCategories (Request $request)
    {
        $categories = new Category();
        $file = $request->file('picture');
        $input = $request->all();

        if ($file) {
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . rand(1000, 9999) . '.' . $ext;
            $file->storeAs('public/img/categories', $fileName);
            $categories->picture = $fileName;
        }

        $categories->name = $input['name'];
        $categories->description = $input['description'];
        $categories->picture = $fileName;
        $categories->save();
        session()->flash('addCategories');
        return back();
    }

    public function addProducts (Request $request)
    {
        $products = new Product();
        $file = $request->file('picture');
        $input = $request->all();

        if ($file) {
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . rand(1000, 9999) . '.' . $ext;
            $file->storeAs('public/img/products', $fileName);
            $products->picture = $fileName;
        }

        $products->name = $input['name'];
        $products->description = $input['description'];
        $products->price = $input['price'];
        $products->picture = $fileName;
        $products->category_id = $input['category_id'];
        $products->save();
        session()->flash('addProducts');
        return back();
    }

    public function enterAsUser ($userId)
    {
        Auth::loginUsingId($userId);
        return redirect()->route('home');
    }

    public function getUser ()
    {
        $users = User::get();
        $data = [
            'users' => $users,
            'title' => 'Список пользователей',
        ];
        return view('admin.user', $data);
    }

    public function getCategory ()
    {
        $categories = Category::get();
        $data = [
            'categories' => $categories,
            'title' => 'Список категорий',
        ];
        return view('admin.category', $data);
    }

    public function getProduct ()
    {
        $products = Product::get();
        $data = [
            'products' => $products,
            'title' => 'Список продуктов',
        ];
        return view('admin.product', $data);
    }

    public function exportCategories ()
    {
        $exportColumns = true;
        ExportCategories::dispatch($exportColumns);
        session()->flash('startExportCategories');
        return back();
    }

    public function exportProducts ()
    {
        $exportColumns = true;
        ExportProducts::dispatch($exportColumns);
        session()->flash('startExportProducts');
        return back();
    }

    public function importCategories ()
    {
        $exportColumns = true;
        ImportCategories::dispatch($exportColumns);
        session()->flash('startImportCategories');
        return back();
    }

    public function importProducts ()
    {
        $exportColumns = true;
        ImportProducts::dispatch($exportColumns);
        session()->flash('startImportProducts');
        return back();
    }

}
