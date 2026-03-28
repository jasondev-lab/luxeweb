<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetPasswordForm($token) {
        $menu='home';
        $side_items=Product::where('status', 2)->get();
        $home['description']=Setting::where('meta_key', 'home-description')->first();
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();

        ini_set('memory_limit','256M');

        $setting_bottom_images=Setting::where('meta_key', 'home-bottom-images')->first();
        $setting_image_sizes=Setting::where('meta_key', 'image-sizes')->first();
        $image_sizes=$setting_image_sizes['meta_value'];
        $bottom_images=$setting_bottom_images['meta_value'];
        for($i=0; $i<count($bottom_images); $i++){
            $thumb_name=$image_sizes['home_bottom_image_width'].'_'.$image_sizes['home_bottom_image_height'].'_'.$bottom_images[$i]['name'];
            if(!File::isDirectory(public_path('uploads/home/thumb'))){
                File::makeDirectory(public_path('uploads/home/thumb'), 0777, true, true);        
            }
            if(!File::exists(public_path('uploads/home/thumb').'/'.$thumb_name)){
                $thumb = Image::make(public_path('uploads/home').'/'.$bottom_images[$i]['name']);
                $thumb->orientate();
                $thumb->resize($image_sizes['home_bottom_image_width'], $image_sizes['home_bottom_image_height'], function ($const) {
                    $const->aspectRatio();
                })->save(public_path('uploads/home/thumb').'/'.$thumb_name);
            }
            $bottom_images[$i]['thumb']=$thumb_name;
        }

        $setting_slide_images=Setting::where('meta_key', 'home-slide-images')->first();
        $slide_images=$setting_slide_images['meta_value'];
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

        return view('pages.front.forget-password-link', compact('menu', 'side_items', 'home', 'slide_images', 'bottom_images', 'image_sizes', 'token'));
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email, 
                            'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/home')->with('message', 'Your password has been changed!');
    }
}
