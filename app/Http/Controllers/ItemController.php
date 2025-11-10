<?php
namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('laboratory')->paginate(10);
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $labs = Laboratory::all();
        return view('items.create', compact('labs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'laboratory_id' => 'required',
            'kode_barang' => 'required|unique:items',
            'nama_barang' => 'required',
            'status' => 'required',
        ]);

        Item::create($request->all());
        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
{
    $item = Item::findOrFail($id);
    $laboratories = Laboratory::all();
    return view('items.edit', compact('item', 'laboratories'));
}


    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama_barang' => 'required',
            'status' => 'required',
        ]);

        $item->update($request->all());
        return redirect()->route('items.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Barang dihapus.');
    }
}
