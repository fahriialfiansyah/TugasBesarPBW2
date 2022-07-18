<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Barang;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Barang::latest()->paginate(5);

        return view('admin.store.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $input = $request->all();

        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'barang/gambar/';
            $profileImage = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }

        Barang::create($input);

        return redirect()->route('store.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Barang::findOrFail($id);
        return view('admin.store.show',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Barang::find($id);
        return view('admin.store.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Barang::find($id);
        $product->nama_barang = $request->input('nama_barang');
        $product->harga = $request->input('harga');
        $product->stok = $request->input('stok');
        if ($request->hasFile('gambar')) {
            $destination = 'barang/gambar/'.$product->gambar;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename =  date('YmdHis') . '.' . $extension;
            $file->move('barang/gambar/', $filename);
            $product->gambar = $filename;
        }
        $product->update();
        return redirect()->route('store.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $product)
    {
        $product->delete();

        return redirect()->route('store.index')
                        ->with('success','Product deleted successfully');
    }
}
