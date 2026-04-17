<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Str;
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

        // $category=Category::find($id);
        $products=Product::where('category_id', $id)->get();

        // $categories = Category::all();
        $title = $id == 1 ? 'Pottery' : ($id == 2 ? 'Glass' : ($id == 3 ? 'Lightings' : 'Metals'));

        return view('pages.front.shop', compact('menu', 'side_items', 'products', 'home', 'image_sizes', 'title'));
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

        $product=Product::find($id);
        // $category=Category::find($product['category_id']);

        // $categories = Category::all();
        $category = $id == 1 ? 'Pottery' : ($id == 2 ? 'Glass' : ($id == 3 ? 'Lightings' : 'Metals'));

        return view('pages.front.product-detail', compact('menu', 'side_items', 'product', 'home', 'image_sizes', 'category', 'shop_buttons'));
    }

    public function search(Request $request)
    {
        $menu = 'search';
        $home['colors'] = Setting::where('meta_key', 'colors')->first();
        $home['text'] = Setting::where('meta_key', 'text')->first();
        $home['mobile'] = Setting::where('meta_key', 'mobile')->first();
        $home['logos'] = Setting::where('meta_key', 'logos')->first();
        $home['social'] = Setting::where('meta_key', 'social')->first();
        $home['background_image'] = Setting::where('meta_key', 'background-image')->first();
        $home['website'] = Setting::where('meta_key', 'website')->first();
        $home['copyright'] = Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation'] = Setting::where('meta_key', 'bottom-navigation')->first();
        $home['shop'] = Setting::where('meta_key', 'shop')->first();
        $home['menu'] = Setting::where('meta_key', 'menu')->first();

        $q = trim((string) $request->input('q', ''));
        $products = collect();
        if ($q !== '') {
            $like = '%' . addcslashes($q, '%_\\') . '%';
            $products = Product::where(function ($query) use ($like) {
                    $query->where('name', 'like', $like)
                        ->orWhere('short_description', 'like', $like)
                        ->orWhere('full_description', 'like', $like);
                })
                ->orderBy('name')
                ->get();
        }

        $results = $products->map(function ($product) {
            $raw = $product->short_description ?: $product->full_description;
            $snippet = Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags((string) $raw))), 220);

            $images = $product->images ?? [];
            $imageUrl = null;
            if (is_array($images) && count($images) > 0 && ! empty($images[0])) {
                $imageUrl = asset('uploads/products/' . $images[0]);
            }

            return [
                'id' => $product->id,
                'name' => $product->name,
                'snippet' => $snippet,
                'image_url' => $imageUrl,
            ];
        });

        // $categories = Category::all();

        return view('pages.front.search', compact('menu', 'home', 'q', 'results'));
    }
}
