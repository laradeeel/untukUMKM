<?php

namespace App\Http\Controllers;

use App\Models\Menu_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function persatujenis(Menu_category $category)
    {
        return view('home_1category', [
            'title' => 'Home',
            'category' => $category,
            'menu' => $category->menu,
            'menu_category' => Menu_category::all()
        ]);
    }

    // METHOD TAMBAH KATEGORY MENU BARU
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_category' => 'required|unique:menu_categories,nama_category|max:15',
        ], [
            'nama_category.required' => 'Nama Category Wajib Diisi',
            'nama_category.unique' => 'Nama Category Sudah Ada',
            'nama_category.max' => 'Maksimal 15 Karakter Huruf',
        ]);

        $slug = $request->nama_category;

        Menu_category::create([
            'nama_category' => $request->input('nama_category'),
            'slug' => Str::slug($slug, '-'),
        ]);

        return redirect('/tambah-menu')->with('success', 'Kategori Baru Ditambahkan.');
    }

    // METHOD HAPUS KATEGORY MENU BARU
    public function destroy(Menu_category $category)
    {
        $category->delete();
        return redirect('/tambah-menu')->with('success-hapus', 'Kategori Berhasil Dihapus.');
    }
}
