<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    public function index(){
        return view('todolist',['listItems' => ListItem::where('is_complete','0')->get()]);
    }

    public function markComplete($id){
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
        return redirect("/");
    }

    public function saveItem(Request $request){
        
        \Log::info(json_encode($request->all()));
        
        $newlistItem = new ListItem;
        $newlistItem->name = $request->listItem;
        $newlistItem->is_complete = 0;
        $newlistItem->save();
        
       // return view('todolist',['listItems' => ListItem::all()]);
        return redirect('/');

    }
}
