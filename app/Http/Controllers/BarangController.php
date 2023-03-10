<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $barang = Barangs::all();

        return view('dolphin.barang.index')->with([
            'barang' =>Barangs::all(),
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('dolphin.barang.create')->with([
            'user' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'     => 'required|min:5',
            'detail'   => 'required|min:10',
            'pendata'   => 'required|min:10',
            'tanggal'   => 'required',
            'hari'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/data/fotoBarangDolphin', $image->hashName());

        //create post
        barangs::create([
            'image'     => $image->hashName(),
            'name'     => $request->name,
            'detail'   => $request->detail,
            'pendata'   => $request->pendata,
            'tanggal'   => $request->tanggal,
            'hari'   => $request->hari
        ]);

        //redirect to index
        return redirect()->intended('dataBarang')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barangs  $barangs
     * @return \Illuminate\Http\Response
     */
    public function show(barangs $barangs, $id)
    {
        $user = Auth::user();
        $barang = Barangs::find($id);
        return view('dolphin.barang.show')->with([
            'barang' => Barangs::find($id),
            'user' => Auth::user()
        ]);
        // return Barangs::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barangs  $barangs
     * @return \Illuminate\Http\Response
     */
    public function edit(barangs $barangs, $id)
    {
        $user = Auth::user();
        $barangs = Barangs::find($id);
        return view('dolphin.barang.edit')->with([
            'barangs' => Barangs::find($id),
            'user' => Auth::user()
        ]);
        // return Barangs::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barangs  $barangs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barangs $barangs)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'     => 'required|min:5',
            'detail'   => 'required',
            'pendata'   => 'required',
            'tanggal'   => 'required',
            'hari'   => 'required'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/data/fotoBarangDolphin', $image->hashName());

            //delete old image
            Storage::delete('public/data/fotoBarangDolphin/'.$barangs->image);

            //update post with new image
            $barangs->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'detail'   => $request->detail,
                'pendata'   => $request->pendata,
                'tanggal'   => $request->tanggal,
                'hari'   => $request->hari
            ]);

        } else {

            //update post without image
            $barangs->update([
                'name'     => $request->name,
                'detail'   => $request->detail,
                'pendata'   => $request->pendata,
                'tanggal'   => $request->tanggal,
                'hari'   => $request->hari
            ]);
        }

        //redirect to index
        return redirect()->intended('dataBarang')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barangs  $barangs
     * @return \Illuminate\Http\Response
     */
    public function destroy(barangs $barangs)
    {
        //delete image
        Storage::delete('public/data/fotoBarangDolphin/'. $barangs->image);

        //delete post
        $barangs->delete();

        //redirect to index
        return redirect()->intended('dataBArang')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
