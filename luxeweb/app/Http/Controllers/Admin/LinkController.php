<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu='Links';
        $submenu='List';
        return view('pages.admin.links', compact('menu', 'submenu'));
    }

    public function getLinks(){
        $links=Link::all();
        $result['data']=$links;
        return json_encode($result);
    }

    public function saveLink(Request $request){
        $request->validate([
            'title' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);
        
        $input=$request->all();
        if($input['method']=='add'){
            Link::create($input);
        }else{
            $link=Link::find($input['link_id']);
            $link['title']=$input['title'];
            $link['link']=$input['link'];
            $link['description']=$input['description'];
            $link['ebay_link']=$input['ebay_link'];
            $link->save();
        }

        return response()->json(['state'=>1]);
    }

    public function getLink(Request $request){
        $link=Link::find($request->link_id);
        return response()->json($link);
    }

    public function deleteLink(Request $request){
        Link::find($request->link_id)->delete();
        return response()->json(['state'=>1]);
    }
}
