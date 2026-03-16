<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\SecondSetting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;
use File;

class SettingsController extends Controller
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
        $menu='Settings';
        $submenu='';
        $setting=Setting::where('meta_key', 'colors')->first();
        $result['colors']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'text')->first();
        $result['text']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'image-sizes')->first();
        $result['image_sizes']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'email')->first();
        $result['email']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'logos')->first();
        $result['logos']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'social')->first();
        $result['social']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'signup')->first();
        $result['signup']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'background-image')->first();
        $result['background_image']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'shop')->first();
        $result['shop']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'website')->first();
        $result['website']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'copyright')->first();
        $result['copyright']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'bottom-navigation')->first();
        $result['bottom_navigation']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'background-image-comingsoon')->first();
        $result['background_image_comingsoon']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'comingsoon_font_color')->first();
        $result['comingsoon_font_color']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'comingsoon_background')->first();
        $result['comingsoon_background']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'mobile')->first();
        $result['mobile']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'contact')->first();
        $result['contact']=empty($setting) ? [] : $setting['meta_value'];

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $result['web_state']=$json['web_state'];

        $user = Auth::user();
        if(!$user->google2fa_enabled){
            $google2fa = new Google2FA();
            $secret = $google2fa->generateSecretKey();
            $user->google2fa_secret = $secret;
            $user->save();
        }

        return view('pages.admin.settings', compact('menu', 'submenu', 'result', 'user'));
    }
    public function saveSecondSetting(Request $request){
        $meta_value=$request->meta_value;
        $meta_value=json_decode($request->meta_value, true);
        
        $field = sprintf('{"web_state":"%u","elegantantiques_state":"0"}',$meta_value['web_state'] );
        DB::connection('mysql2')->table('settings')
        ->where('meta_key', 'home')
        ->update(['meta_value' => $field]);
        
        return response()->json(['state'=>1]);
    }
    public function saveSetting(Request $request){
        $meta_key=$request->meta_key;
        $meta_value=json_decode($request->meta_value, true);
        $setting=Setting::where('meta_key', $meta_key)->first();
        if(empty($setting)){
            $setting=new Setting();
            $setting['meta_key']=$meta_key;
            $setting['meta_value']=$meta_value;
            $setting->save();
        }else{
            $setting['meta_value']=$meta_value;
            $setting->save();
        }

        if($request->meta_key=='image-sizes'){
            $thumb_path=public_path('uploads/home/thumb');
            File::deleteDirectory($thumb_path);
        }

       
        return response()->json(['state'=>1]);
    }

    public function updateAdmin(Request $request){
        $data = json_decode($request->data, true);

        $setting=Setting::where('meta_key', 'email')->first();
        $meta_value = $setting['meta_value'];
        
        $admin=User::where('email', $meta_value['admin'])->first();
        $admin['email'] = $data['email'];
        if(isset($data['password'])) $admin['password']=Hash::make($data['password']);
        $admin->save();

        $meta_value['admin'] = $data['email'];
        $setting['meta_value'] = $meta_value;
        $setting->save();

        return response()->json(['state'=>1]);
    }

    public function updateDev(Request $request){
        $data = json_decode($request->data, true);

        $setting=Setting::where('meta_key', 'email')->first();
        $meta_value = $setting['meta_value'];
        
        $dev=User::where('email', $meta_value['dev'])->first();
        $dev['email'] = $data['email'];
        if(isset($data['password'])) $dev['password']=Hash::make($data['password']);
        $dev->save();

        $meta_value['dev'] = $data['email'];
        $setting['meta_value'] = $meta_value;
        $setting->save();

        return response()->json(['state'=>1]);
    }

    public function updateContact(Request $request){
        $data = json_decode($request->data, true);
        $setting=Setting::where('meta_key', 'contact')->first();
        if(empty($setting)){
            $setting=new Setting();
            $setting['meta_key']='contact';
            $setting['meta_value']=array('email'=>$data['email']);
            $setting->save();
        }else{
            $meta_value = $setting['meta_value'];
            $meta_value['email'] = $data['email'];
            $setting['meta_value'] = $meta_value;
            $setting->save();
        }

        return response()->json(['state'=>1]);
    }

    public function saveBackgroundImage(Request $request){
        $request->validate([
            'image_sidebar' => 'mimes:jpg,jpeg,png|max:20480',
            'image_topbar' => 'mimes:jpg,jpeg,png|max:20480',
            'image_navigationbar' => 'mimes:jpg,jpeg,png|max:20480',
        ]);

        $meta_key=$request->meta_key;
        $setting=Setting::where('meta_key', $meta_key)->first();
        if(empty($setting)){
            $image_sidebar='';
            $image_topbar='';
            $image_navigationbar='';
        }else{
            $image_sidebar=isset($setting['meta_value']['sidebar']) && $request->image_sidebar_remove !=1 ? $setting['meta_value']['sidebar'] : '';
            $image_topbar=isset($setting['meta_value']['topbar']) && $request->image_topbar_remove !=1 ? $setting['meta_value']['topbar'] : '';
            $image_navigationbar=isset($setting['meta_value']['navigationbar']) && $request->image_navigationbar_remove !=1 ? $setting['meta_value']['navigationbar'] : '';
        }
        
        if ($request->hasFile('image_sidebar')) {
            if ($request->file('image_sidebar')->isValid()) {
                $image_sidebar = 'sidebar'.time().'.'.$request->image_sidebar->extension();
                $request->image_sidebar->move(public_path('uploads/home'), $image_sidebar);                
            }
        }
        
        if ($request->hasFile('image_topbar')) {
            if ($request->file('image_topbar')->isValid()) {
                $image_topbar = 'topbar'.time().'.'.$request->image_topbar->extension();
                $request->image_topbar->move(public_path('uploads/home'), $image_topbar);
            }
        }

        if ($request->hasFile('image_navigationbar')) {
            if ($request->file('image_navigationbar')->isValid()) {
                $image_navigationbar = 'navigationbar'.time().'.'.$request->image_navigationbar->extension();
                $request->image_navigationbar->move(public_path('uploads/home'), $image_navigationbar);
            }
        }

        
        if(empty($setting)){
            $setting=new Setting();
            $setting['meta_key']=$meta_key;
            $setting['meta_value']=array('sidebar'=>$image_sidebar, 'topbar'=>$image_topbar, 'navigationbar'=>$image_navigationbar);
            $setting->save();
        }else{
            $setting['meta_value']=array('sidebar'=>$image_sidebar, 'topbar'=>$image_topbar, 'navigationbar'=>$image_navigationbar);
            $setting->save();
        }

        return response()->json(['state'=>1]);
    }

    public function saveBackgroundImageComingSoon(Request $request){
        $request->validate([
            'image_comingsoon' => 'mimes:jpg,jpeg,png|max:20480',
        ]);

        $meta_key=$request->meta_key;
        $setting=Setting::where('meta_key', $meta_key)->first();
        if(empty($setting)){
            $image_comingsoon='';
        }else{
            $image_comingsoon=isset($setting['meta_value']['url']) && $request->image_comingsoon_remove !=1 ? $setting['meta_value']['url'] : '';
            if($request->image_comingsoon_remove == 1 && !empty($setting['meta_value']['url'])) {
                $image_path = 'assets/media/comingsoon/'.$setting['meta_value']['url'];
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $image_comingsoon = '';
            }
        }
        

        if ($request->hasFile('image_comingsoon')) {
            if ($request->file('image_comingsoon')->isValid()) {
                $image_comingsoon = 'comingsoon'.time().'.'.$request->image_comingsoon->extension();
                $request->image_comingsoon->move('assets/media/comingsoon', $image_comingsoon);
            }
        }
        
        if(empty($setting)){
            $setting=new Setting();
            $setting['meta_key']=$meta_key;
            $setting['meta_value']=array('url'=>$image_comingsoon);
            $setting->save();
        }else{
            $setting['meta_value']=array('url'=>$image_comingsoon);
            $setting->save();
        }

        return response()->json(['state'=>1]);
    }
}



