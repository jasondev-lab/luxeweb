<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Image;
use File;

class PoliciesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu='policies';
        $side_items=Product::where('status', 2)->get();
        $description=Setting::where('meta_key', 'policies-description')->first();
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['mobile']=Setting::where('meta_key', 'mobile')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();
        $home['menu']=Setting::where('meta_key', 'menu')->first();

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $home['home']=$json['web_state'];

        ini_set('memory_limit','256M');

        $setting_image_sizes=Setting::where('meta_key', 'image-sizes')->first();
        $image_sizes=$setting_image_sizes['meta_value'];
        for($i=0; $i<count($side_items); $i++){
            $image=isset($side_items[$i]['images']) && count($side_items[$i]['images'])>0 ? $side_items[$i]['images'][0] : 'no_image.jpg';
            $thumb_name=$image_sizes['left_side_image_width'].'_'.$image_sizes['left_side_image_height'].'_'.$image;
            if(!File::isDirectory(public_path('uploads/products/thumb'))){
                File::makeDirectory(public_path('uploads/products/thumb'), 0777, true, true);        
            }
            if(!File::exists(public_path('uploads/products/thumb').'/'.$thumb_name)){
                $thumb = Image::make(public_path('uploads/products').'/'.$image);
                $thumb->orientate();
                $thumb->resize($image_sizes['left_side_image_width'], $image_sizes['left_side_image_height'], function ($const) {
                    $const->aspectRatio();
                })->save(public_path('uploads/products/thumb').'/'.$thumb_name);
            }
            $side_items[$i]['thumb']=$thumb_name;
            $side_items[$i]['description']=strlen($side_items[$i]['short_description'])>80 ? mb_substr($side_items[$i]['short_description'], 0, 80).' ...' : $side_items[$i]['short_description'];
        }

        $categories = Category::all();

        return view('pages.front.policies', compact('menu', 'side_items', 'description', 'home', 'image_sizes', 'categories'));
    }
}
