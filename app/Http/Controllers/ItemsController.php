<?php

namespace App\Http\Controllers;
use App\Models\Items;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
  public function index() {
    $items = Items::all();
    return view('shop/items')->with('items',$items);
  }
  public function show($id) {
    $item = Items::find($id);
    return view('shop/show')->with('item', $item);
  }
}
