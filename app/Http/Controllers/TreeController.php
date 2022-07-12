<?php

namespace App\Http\Controllers;

use App\Models\Tree;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $trees = Tree::all();

        $sortCategory = request('sort-category');
        $sortChild = request('sort-child');

        {
            $sorted = $trees->sortBy([
                ['name', $sortCategory],

            ]);
        }

        $sorted->values()->all();

        return view('dashboard', [
            'trees' => $sorted,
            'sortCategory' => $sortCategory,
            'sortChild' => $sortChild
        ]);
    }

    public function index2()
    {
        $trees = Tree::latest();

        return view('node_add', [
            'trees' => Tree::all()
        ]);
    }

    public function index3()
    {
        $trees = Tree::latest();

        return view('node_delete', [
            'trees' => Tree::all()
        ]);
    }

    public function index4()
    {
        $trees = Tree::latest();

        return view('node_edit', [
            'trees' => Tree::all()
        ]);
    }

    public function store()
    {
        $tree = new Tree();

        $id = request('id');

        $tree->name = request('name');
        $tree->parent_id = request('id');

        if($id>0)
        {
            $parentree = Tree::findOrFail($id);
            $tree->depth = $parentree->depth+1;
        }

        $tree->save();

        return redirect('/dashboard')->with('mssg', 'Node został dodany pomyślnie.');
    }

    public function update()
    {
        $id = request('id');
        $tree = Tree::findOrFail($id);

        $new_id = request('new_id');

        $tree->name = request('name');
        $tree->parent_id = request('new_id');

        if ($new_id>0)
        {
            $parentree = Tree::findOrFail($new_id);
            if ($parentree->id == $tree->id) {
                return redirect('/node_edit')->with('mssg', 'Nie można przypisać nodea do samego siebie');
            }
            $tree->depth = $parentree->depth+1;
        }

        $tree->save();

        return redirect('/dashboard')->with('mssg', 'Node został edytowany pomyślnie.');
    }

    public function destroy()
    {

        $id = request('id');
        $tree = Tree::findOrFail($id);

        $tree->delete();

        return redirect('/dashboard')->with('mssg', 'Node został usunięty pomyślnie.');
    }
}
