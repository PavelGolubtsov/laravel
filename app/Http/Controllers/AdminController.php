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

class AdminController extends Controller
{
    public function index ()
    {
        $users =User::get();
        return view('admin.home', compact('users'));
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
