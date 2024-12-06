<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Produk;

class AdminController extends Controller
{

    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Berhasil Dihapus');
        return redirect()->back();
    }


    public function edit_category(Request $request, $id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Berhasil Diedit');

        return redirect('/view_category');
    }

    public function add_produk()
    {

        $category = Category::all();

        return view('admin.add_produk', compact('category'));
    }

    public function upload_produk(Request $request)
    {
        $data = new Produk;
        $data->title = $request->title;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('produks', $imagename);
            $data->image = $imagename;
        }
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('
        Produk Berhasil Ditambahkan');

        return redirect()->back();
    }

    public function view_produk()
    {
        $produk = Produk::paginate(3);
        return view('admin.view_produk', compact('produk'));
    }


    public function hapus_produk($id)
    {
        $data = Produk::find($id);

        $image_path = public_path('produks/' . $data->image);

        if (file_exists($image_path)) {

            unlink($image_path);
        }
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('
        Berhasil di Hapus');

        return redirect()->back();
    }

    public function update_produk($id)
    {
        $data = Produk::find($id);

        return view('admin.update_page', compact('data'));
    }

    public function edit_produk(Request $request, $id)
    {

        $data = Produk::find($id);
        $data->title = $request->title;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('produks', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        return redirect('/view_produk');
    }

    public function cari_produk(Request $request)
    {

        $search = $request->search;
        $produk = Produk::where('title', 'LIKE', '%' . $search . '%')->paginate(3);

        return view('admin.view_produk', compact('produk'));
    }
}
