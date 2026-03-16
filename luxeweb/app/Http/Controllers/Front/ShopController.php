<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use Image;
use File;

class ShopController extends Controller
{
    public $side_items=[];
    public $image_sizes=[];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        ini_set('memory_limit','256M');
        
        $side_items=Product::where('status', 2)->get();
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

        $this->side_items=$side_items;
        $this->image_sizes=$image_sizes;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showShopOurStore()
    {
        $menu='shop-our-store';
        $side_items=$this->side_items;
        $image_sizes=$this->image_sizes;
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['mobile']=Setting::where('meta_key', 'mobile')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();
        $home['shop']=Setting::where('meta_key', 'shop')->first();
        $home['shop_buttons']=Setting::where('meta_key', 'shop-buttons')->first();

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $home['home']=$json['web_state'];

        $categories=Category::all();

        return view('pages.front.shop-our-store', compact('menu', 'side_items', 'home', 'image_sizes', 'categories'));
    }

    public function showCategory($id){
        $menu='shop-our-store';
        $side_items=$this->side_items;
        $image_sizes=$this->image_sizes;
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['mobile']=Setting::where('meta_key', 'mobile')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();
        $home['shop']=Setting::where('meta_key', 'shop')->first();
        $home['menu']=Setting::where('meta_key', 'menu')->first();

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $home['home']=$json['web_state'];

        $category=Category::find($id);
        $products=Product::where('category_id', $id)->get();

        $categories = Category::all();

        return view('pages.front.shop', compact('menu', 'side_items', 'products', 'home', 'image_sizes', 'category', 'categories'));
    }

    public function showProduct($id)
    {
        $menu='shop-our-store';
        $side_items=$this->side_items;
        $image_sizes=$this->image_sizes;
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['mobile']=Setting::where('meta_key', 'mobile')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();
        $shop_buttons=Setting::where('meta_key', 'shop-buttons')->first();
        $home['menu']=Setting::where('meta_key', 'menu')->first();

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $home['home']=$json['web_state'];

        $product=Product::find($id);
        $category=Category::find($product['category_id']);

        $categories = Category::all();

        return view('pages.front.product-detail', compact('menu', 'side_items', 'product', 'home', 'image_sizes', 'category', 'shop_buttons', 'categories'));
    }    
}
