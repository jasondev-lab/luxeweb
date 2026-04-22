<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use App\Models\AccessLog;
use Illuminate\Support\Facades\Hash;
use Image;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkauth');        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $menu='home';
        $side_items=Product::where('status', 2)->get();
        $home['description']=Setting::where('meta_key', 'home-description')->first();
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['mobile']=Setting::where('meta_key', 'mobile')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['slide_speed']=Setting::where('meta_key', 'slide-speed')->first();
        $home['sidebar']=Setting::where('meta_key', 'sidebar')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();
        $home['background_image_comingsoon']=Setting::where('meta_key', 'background-image-comingsoon')->first();
        $home['comingsoon_font_color']=Setting::where('meta_key', 'comingsoon_font_color')->first();
        $home['comingsoon_background']=Setting::where('meta_key', 'comingsoon_background')->first();
        $home['menu']=Setting::where('meta_key', 'menu')->first();
        // $user=User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin123456'),
        // ]);

        ini_set('memory_limit','256M');

        // $setting_latest_addition_images=Setting::where('meta_key', 'home-latest-addition-images')->first();
        // $setting_image_sizes=Setting::where('meta_key', 'image-sizes')->first();
        // $image_sizes=$setting_image_sizes['meta_value'];
        // $latest_addition_images=$setting_latest_addition_images['meta_value'];
        // for($i=0; $i<count($latest_addition_images); $i++){
        //     $thumb_name=$image_sizes['home_bottom_image_width'].'_'.$image_sizes['home_bottom_image_height'].'_'.$latest_addition_images[$i]['name'];
        //     if(!File::isDirectory(public_path('uploads/home/thumb'))){
        //         File::makeDirectory(public_path('uploads/home/thumb'), 0777, true, true);        
        //     }
            
        //     if(!File::exists(public_path('uploads/home/thumb').'/'.$thumb_name)){
        //         //dd(public_path('uploads/home').'/'.$latest_addition_images[$i]['name']);
        //         $thumb = Image::make(public_path('uploads/home').'/'.$latest_addition_images[$i]['name']);
        //         $thumb->orientate();
        //         $thumb->resize($image_sizes['home_bottom_image_width'], $image_sizes['home_bottom_image_height'], function ($const) {
        //             $const->aspectRatio();
        //         })->save(public_path('uploads/home/thumb').'/'.$thumb_name);
        //     }
        //     $latest_addition_images[$i]['thumb']=$thumb_name;
        // }

        $setting_slide_images=Setting::where('meta_key', 'home-slide-images')->first();
        $slide_images=$setting_slide_images['meta_value'];
        $setting_image_sizes=Setting::where('meta_key', 'image-sizes')->first();
        $image_sizes=$setting_image_sizes['meta_value'];
        for($i=0; $i<count($slide_images); $i++){
            $thumb_name=$image_sizes['home_slide_image_width'].'_'.$image_sizes['home_slide_image_height'].'_'.$slide_images[$i]['name'];
            if(!File::isDirectory(public_path('uploads/home/thumb'))){
                File::makeDirectory(public_path('uploads/home/thumb'), 0777, true, true);        
            }
            if(!File::exists(public_path('uploads/home/thumb').'/'.$thumb_name)){
                $thumb = Image::make(public_path('uploads/home').'/'.$slide_images[$i]['name']);
                $thumb->orientate();
                $thumb->resize($image_sizes['home_slide_image_width'], $image_sizes['home_slide_image_height'], function ($const) {
                    $const->aspectRatio();
                })->save(public_path('uploads/home/thumb').'/'.$thumb_name);
            }
            $slide_images[$i]['thumb']=$thumb_name;
        }

        // for($i=0; $i<count($side_items); $i++){
        //     $image=isset($side_items[$i]['images']) && count($side_items[$i]['images'])>0 ? $side_items[$i]['images'][0] : 'no_image.jpg';
        //     $thumb_name=$image_sizes['left_side_image_width'].'_'.$image_sizes['left_side_image_height'].'_'.$image;
        //     if(!File::isDirectory(public_path('uploads/products/thumb'))){
        //         File::makeDirectory(public_path('uploads/products/thumb'), 0777, true, true);       
        //     }
        //     if(!File::exists(public_path('uploads/products/thumb').'/'.$thumb_name)){
        //         $thumb = Image::make(public_path('uploads/products').'/'.$image);
        //         $thumb->orientate();
        //         $thumb->resize($image_sizes['left_side_image_width'], $image_sizes['left_side_image_height'], function ($const) {
        //             $const->aspectRatio();
        //         })->save(public_path('uploads/products/thumb').'/'.$thumb_name);
        //     }
        //     $side_items[$i]['thumb']=$thumb_name;
        //     $side_items[$i]['description']=strlen($side_items[$i]['short_description'])>80 ? mb_substr($side_items[$i]['short_description'], 0, 80).' ...' : $side_items[$i]['short_description'];
        // }

        $pottery_images=array();
        $glass_images=array();
        $metals_images=array();
        $lighting_images=array();

        for($i=0; $i<count($slide_images); $i++){
            if($slide_images[$i]['category']=='pottery'){
                $pottery_images[]=$slide_images[$i]['thumb'];
            }elseif($slide_images[$i]['category']=='glass'){
                $glass_images[]=$slide_images[$i]['thumb'];
            }elseif($slide_images[$i]['category']=='metals'){
                $metals_images[]=$slide_images[$i]['thumb'];
            }elseif($slide_images[$i]['category']=='lighting'){
                $lighting_images[]=$slide_images[$i]['thumb'];
            }
        }

        $home['pottery_images']=$pottery_images;
        $home['glass_images']=$glass_images;
        $home['metals_images']=$metals_images;
        $home['lighting_images']=$lighting_images;

        $ip = $request->ip();
        $access_log = AccessLog::where('ip', $ip)->first();
        if(empty($access_log)) {
            $access_log = new AccessLog();
            $access_log['ip'] = $ip;
            $access_log->save();
        }

        // $categories = Category::all();

        // return view('pages.front.home', compact('menu', 'side_items', 'home', 'slide_images', 'latest_addition_images'));
        return view('pages.front.home', compact('menu', 'home'));
    }
    
    public function preview()
    {
        $menu='preview';
        $side_items=Product::where('status', 2)->get();
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['mobile']=Setting::where('meta_key', 'mobile')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();
        $description=Setting::where('meta_key', 'contact-description')->first();
        $home['menu']=Setting::where('meta_key', 'menu')->first();

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
        $preview=Setting::where('meta_key', 'preview')->first();
        $preview_data=empty($preview) ? [] : $preview['meta_value'];

        return view('pages.front.preview', compact('menu', 'side_items', 'home', 'description', 'image_sizes', 'categories', 'preview_data'));
    }
}
