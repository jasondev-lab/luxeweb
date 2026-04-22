<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class PagesController extends Controller
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

    public function showPreview(){
        $menu='Pages';
        $submenu='Preview';
        $result=Setting::where('meta_key', 'preview')->first();
        return view('pages.admin.pages-preview', compact('menu', 'submenu', 'result'));
    }

    public function savePreview(Request $request){
        $meta_key="preview";

        $setting=Setting::where('meta_key', $meta_key)->first();
        if(empty($setting)){
            $setting=new Setting();
            $setting['meta_key']=$meta_key;
            $setting['meta_value']=array(
                'logo_width'=>$request->logo_width, 
                'logo_height'=>$request->logo_height, 
                'background_color'=>$request->background_color,
                'text_color'=>$request->text_color,
                'text_font'=>$request->text_font,
                'text_size'=>$request->text_size,
                'line_color'=>$request->line_color,
                'line_width'=>$request->line_width,
                'speed'=>$request->speed,
                'logo'=>$request->logo
            );
            $setting->save();
        }else{
            $preview=$setting['meta_value'];
            $setting['meta_value']=array(
                'logo_width'=>$request->logo_width, 
                'logo_height'=>$request->logo_height, 
                'background_color'=>$request->background_color, 
                'text_color'=>$request->text_color,
                'text_font'=>$request->text_font,
                'text_size'=>$request->text_size,
                'line_color'=>$request->line_color,
                'line_width'=>$request->line_width,
                'speed'=>$request->speed,
                'logo'=>$request->logo
            );
            $setting->save();
        }
        return response()->json(['state'=>1]);
    }

    public function showHome(){
        $menu='Pages';
        $submenu='Home';
        $setting=Setting::where('meta_key', 'home-description')->first();
        $result['description']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'home-slide-images')->first();
        $result['slide_images']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'home-latest-addition-images')->first();
        $result['latest_addition_images']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'slide-speed')->first();
        $result['slide_speed']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'sidebar')->first();
        $result['sidebar']=empty($setting) ? [] : $setting['meta_value'];
        return view('pages.admin.pages-home', compact('menu', 'submenu', 'result'));
    }

    public function saveDescription(Request $request){
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
        return response()->json(['state'=>1]);
    }

    public function saveSlideSpeed(Request $request){
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
        return response()->json(['state'=>1]);
    }

    public function saveSidebar(Request $request){
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
        return response()->json(['state'=>1]);
    }

    public function saveImage(Request $request){
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png|max:20480',
        ]);

        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/home'), $image);
                
                $meta_key=$request->meta_key;
                $setting=Setting::where('meta_key', $meta_key)->first();
                if(empty($setting)){
                    $setting=new Setting();
                    $setting['meta_key']=$meta_key;
                    $values=array();
                    $values[]=array('id'=>1, 'name'=>$image, 'category'=>isset($request->category) ? $request->category : '');
                    $setting['meta_value']=$values;
                    $setting->save();
                }else{
                    $values=$setting['meta_value'];
                    $id=count($values)==0 ? 1 : $values[count($values)-1]['id']+1;
                    $values[]=array('id'=>$id, 'name'=>$image, 'category'=>isset($request->category) ? $request->category : '');
                    $setting['meta_value']=$values;
                    $setting->save();
                }
                return response()->json(['state'=>1, 'images'=>$values]);
            }
        }
        
        return response()->json(['state'=>0]);
    }

    public function deleteImage(Request $request){
        $meta_key=$request->meta_key;
        $deleted_id=$request->id;
        $setting=Setting::where('meta_key', $meta_key)->first();
        if(empty($setting)){
            return response()->json(['state'=>0]);
        }else{
            $olds=$setting['meta_value'];
            $values=[];
            $idx=1;
            foreach($olds as $val){
                if($deleted_id!=$val['id']){
                    $values[]=array('id'=>$idx, 'name'=>$val['name'], 'category'=>isset($val['category']) ? $val['category'] : '');
                    $idx++;
                }                    
            }            
            $setting['meta_value']=$values;
            $setting->save();
            return response()->json(['state'=>0, 'images'=>$values]);
        }        
    }

    public function showJoinDirectory(){
        $menu='Pages';
        $submenu='Join Directory';
        $setting=Setting::where('meta_key', 'join-directory-description')->first();
        $result['description']=empty($setting) ? [] : $setting['meta_value'];
        return view('pages.admin.pages-join-directory', compact('menu', 'submenu', 'result'));
    }

    public function showShopOurStore(){
        $menu='Pages';
        $submenu='Shop Our Store';
        $setting=Setting::where('meta_key', 'shop-buttons')->first();
        $result['buttons']=empty($setting) ? [] : $setting['meta_value'];
        return view('pages.admin.pages-shop-our-store', compact('menu', 'submenu', 'result'));
    }

    public function showAdvertising(){
        $menu='Pages';
        $submenu='Advertising';
        $setting=Setting::where('meta_key', 'advertising-description')->first();
        $result['description']=empty($setting) ? [] : $setting['meta_value'];
        return view('pages.admin.pages-advertising', compact('menu', 'submenu', 'result'));
    }

    public function showWebDesign(){
        $menu='Pages';
        $submenu='Web Design';
        $setting=Setting::where('meta_key', 'web-design-description')->first();
        $result['description']=empty($setting) ? [] : $setting['meta_value'];
        $setting=Setting::where('meta_key', 'web-design-images')->first();
        $result['images']=empty($setting) ? [] : $setting['meta_value'];
        return view('pages.admin.pages-web-design', compact('menu', 'submenu', 'result'));
    }

    public function showDealerDirectory(){
        $menu='Pages';
        $submenu='Dealer Directory';
        $setting=Setting::where('meta_key', 'dealer-directory-description')->first();
        $result['description']=empty($setting) ? [] : $setting['meta_value'];
        return view('pages.admin.pages-dealer-directory', compact('menu', 'submenu', 'result'));
    }

    public function showLinksDirectory(){
        $menu='Pages';
        $submenu='Links Directory';
        $setting=Setting::where('meta_key', 'links-directory-description')->first();
        $result['description']=empty($setting) ? [] : $setting['meta_value'];
        return view('pages.admin.pages-links-directory', compact('menu', 'submenu', 'result'));
    }

    public function showPolicies(){
        $menu='Pages';
        $submenu='Policies';
        $setting=Setting::where('meta_key', 'policies-description')->first();
        $result['description']=empty($setting) ? [] : $setting['meta_value'];
        return view('pages.admin.pages-policies', compact('menu', 'submenu', 'result'));
    }

    public function showContact(){
        $menu='Pages';
        $submenu='Contact';
        $setting=Setting::where('meta_key', 'contact-description')->first();
        $result=empty($setting) ? [] : $setting['meta_value'];
        return view('pages.admin.pages-contact', compact('menu', 'submenu', 'result'));
    }

    public function saveShopButtons(Request $request){
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png|max:20480',
        ]);

        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/home'), $image);
                
                $meta_key=$request->meta_key;
                $setting=Setting::where('meta_key', $meta_key)->first();
                if(empty($setting)){
                    $setting=new Setting();
                    $setting['meta_key']=$meta_key;
                    $values=array('color'=>$request->color, 'image'=>$image, 'image_color'=>$request->image_color, 'font'=>$request->font, 'font_color'=>$request->font_color, 'font_size'=>$request->font_size);
                    $setting['meta_value']=$values;
                    $setting->save();
                }else{
                    $values=array('color'=>$request->color, 'image'=>$image, 'image_color'=>$request->image_color, 'font'=>$request->font, 'font_color'=>$request->font_color, 'font_size'=>$request->font_size);
                    $setting['meta_value']=$values;
                    $setting->save();
                }
                return response()->json(['state'=>1]);
            }
        }else{
            $meta_key=$request->meta_key;
            $setting=Setting::where('meta_key', $meta_key)->first();
            if(empty($setting)){
                $setting=new Setting();
                $setting['meta_key']=$meta_key;
                $values=array('color'=>$request->color, 'image'=>'', 'image_color'=>$request->image_color, 'font'=>$request->font, 'font_color'=>$request->font_color, 'font_size'=>$request->font_size);
                $setting['meta_value']=$values;
                $setting->save();
            }else{
                $buttons=$setting['meta_value'];
                $values=array('color'=>$request->color, 'image'=>$buttons['image'], 'image_color'=>$request->image_color, 'font'=>$request->font, 'font_color'=>$request->font_color, 'font_size'=>$request->font_size);
                $setting['meta_value']=$values;
                $setting->save();
            }
            return response()->json(['state'=>1]);
        }
    }
}
