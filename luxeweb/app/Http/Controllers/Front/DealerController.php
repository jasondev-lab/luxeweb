<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
use Illuminate\Support\Facades\Mail;

class DealerController extends Controller
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

    public function showDashboard()
    {
        $menu='dealer-dashboard';
        $side_items=$this->side_items;
        $image_sizes=$this->image_sizes;
        $business_id=0;
        if (Auth::check()){
            $business=Business::where('dealer_id', Auth::user()->id)->first();
            if(empty($business)) $business_id=0;
            else $business_id=$business['id'];
        }
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['mobile']=Setting::where('meta_key', 'mobile')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $home['home']=$json['web_state'];
        
        return view('pages.front.dealer-dashboard', compact('menu', 'side_items', 'home', 'image_sizes', 'business_id'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showDealerDirectory(Request $request)
    {
        $menu='dealer-directory';
        $side_items=$this->side_items;
        $image_sizes=$this->image_sizes;
        $query=DB::table('businesses');
        $query->where('is_approved', 1);
        $state='';
        if(isset($request->state)){
            $state=$request->state;
            $query->where('state', $state);            
        }
        $keyword='';
        if(isset($request->keyword)){
            $keyword=$request->keyword;
            $query->where('keywords', 'like', '%'.$keyword.'%');
        }
            
        $businesses=$query->get();
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();
        $description=Setting::where('meta_key', 'dealer-directory-description')->first();

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $home['home']=$json['web_state'];

        return view('pages.front.dealer-directory', compact('menu', 'side_items', 'businesses', 'state', 'keyword', 'home', 'description', 'image_sizes'));
    }

    public function joinDirectory()
    {
        $menu='join-directory';
        $side_items=$this->side_items;
        $image_sizes=$this->image_sizes;
        $description=Setting::where('meta_key', 'join-directory-description')->first();
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['signup']=Setting::where('meta_key', 'signup')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $home['home']=$json['web_state'];

        $business_id=0;
        if (Auth::check()){
            $business=Business::where('dealer_id', Auth::user()->id)->first();
            if(empty($business)) $business_id=0;
            else $business_id=$business['id'];
        }
        return view('pages.front.join-directory', compact('menu', 'side_items', 'description', 'home', 'image_sizes', 'business_id'));
    }

    public function linksDirectory()
    {
        $menu='links-directory';
        $side_items=$this->side_items;
        $image_sizes=$this->image_sizes;
        $links=Link::all();
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();
        $description=Setting::where('meta_key', 'links-directory-description')->first();

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $home['home']=$json['web_state'];

        return view('pages.front.links-directory', compact('menu', 'side_items', 'links', 'home', 'description', 'image_sizes'));
    }

    public function newBusiness()
    {
        $menu='dealer';
        $side_items=$this->side_items;
        $image_sizes=$this->image_sizes;
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $home['home']=$json['web_state'];

        return view('pages.front.new-business', compact('menu', 'side_items', 'home', 'image_sizes'));
    }

    public function showDealer($id)
    {
        $menu='dealer';
        $side_items=$this->side_items;
        $image_sizes=$this->image_sizes;
        $business=Business::find($id);
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();
        $description=Setting::where('meta_key', 'dealer-directory-description')->first();

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $home['home']=$json['web_state'];

        return view('pages.front.dealer-detail', compact('menu', 'side_items', 'business', 'home', 'description', 'image_sizes'));
    }

    public function uploadBusinessImage(Request $request){
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png|max:20480',
        ]);

        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/businesses'), $image);                
                return response()->json(['state'=>1, 'image'=>$image]);
            }
        }
        
        return response()->json(['state'=>0]);
    }

    public function addBusiness(Request $request){
        $input=$request->all();
        if ($request->hasFile('card')) {
            //  Let's do everything here
            if ($request->file('card')->isValid()) {
                $image = time().'.'.$request->card->extension();
                $request->card->move(public_path('uploads/businesses'), $image);
                $input['card']=$image; 
            }
        }
        if($request->has('images')){
            $input['images']=json_decode($request->images, true);
        }
        if($request->has('keywords')){
            $input['keywords']=json_decode($request->keywords, true);
        }

        $input['is_approved']=0;

        Business::create($input);

        $business=Business::latest()->first();

        if(Auth::check()){
            $setting_email=Setting::where('meta_key', 'email')->first();
            $to_email=$setting_email['meta_value']['address'];
            $data['name']=Auth::user()->name;
            $data['email']=Auth::user()->email;

            Mail::send('pages.front.email-business', compact('data', 'business'), function($message) use ($data, $to_email) {
                $message->to( $to_email, 'Facets' )->subject( 'New Business' );
                $message->from( $data['email'], $data['name']);
            });
        }       

        return response()->json(['state'=>1]);
    }

    public function saveBusiness(Request $request){
        $input=$request->all();
        if ($request->hasFile('card')) {
            //  Let's do everything here
            if ($request->file('card')->isValid()) {
                $image = time().'.'.$request->card->extension();
                $request->card->move(public_path('uploads/businesses'), $image);
                $input['card']=$image; 
            }
        }
        if($request->has('images')){
            $input['images']=json_decode($request->images, true);
        }
        if($request->has('keywords')){
            $input['keywords']=json_decode($request->keywords, true);
        }

        $business=Business::find($input['business_id']);
        $business['name']=$input['name'];
        $business['state']=$input['state'];
        $business['address']=$input['address'];
        $business['web_address']=$input['web_address'];
        if(isset($input['card'])) $business['card']=$input['card'];
        $business['hours']=$input['hours'];
        $business['description']=$input['description'];
        $business['keywords']=$input['keywords'];
        $business['phone_number']=$input['phone_number'];
        $business['facebook']=$input['facebook'];
        $business['twitter']=$input['twitter'];
        $business['instagram']=$input['instagram'];
        $business['images']=$input['images'];
        $business->save();

        return response()->json(['state'=>$business['is_approved']]);
    }

    public function deleteBusiness($id){
        Business::find($id)->delete();
        return redirect('/dealer-directory');
    }

    public function editBusiness($id){
        $business=Business::find($id);
        $menu='dealer';
        $side_items=$this->side_items;
        $image_sizes=$this->image_sizes;
        $home['colors']=Setting::where('meta_key', 'colors')->first();
        $home['text']=Setting::where('meta_key', 'text')->first();
        $home['logos']=Setting::where('meta_key', 'logos')->first();
        $home['social']=Setting::where('meta_key', 'social')->first();
        $home['background_image']=Setting::where('meta_key', 'background-image')->first();
        $home['website']=Setting::where('meta_key', 'website')->first();
        $home['copyright']=Setting::where('meta_key', 'copyright')->first();
        $home['bottom_navigation']=Setting::where('meta_key', 'bottom-navigation')->first();

        $db_ext = \DB::connection('mysql2');
        $set= $db_ext->selectOne("SELECT meta_value FROM settings WHERE meta_key='home'");
        $json=json_decode($set->meta_value, true);
        $home['home']=$json['web_state'];

        return view('pages.front.edit-business', compact('menu', 'side_items', 'home', 'image_sizes', 'business'));
    }
    
    public function showDealers()
    {
        if(!Auth::check()) return redirect('/');

        $menu='Dealers';
        $submenu='List';
        return view('pages.admin.dealers', compact('menu', 'submenu'));
    }

    public function getDealers(){
        $dealers=User::where('role', 'dealer')->get();
        for($i=0; $i<count($dealers); $i++){
            $business=Business::where('dealer_id', $dealers[$i]['id'])->first();
            if(empty($business)){
                $dealers[$i]['business_id']=0;
                $dealers[$i]['business_name']='';
                $dealers[$i]['is_approved']=0;
            }else{
                $dealers[$i]['business_id']=$business['id'];
                $dealers[$i]['business_name']=$business['name'];
                $dealers[$i]['is_approved']=$business['is_approved'];
            }
        }
        $result['data']=$dealers;
        return json_encode($result);
    }

    public function deleteDealer(Request $request){
        User::find($request->dealer_id)->delete();
        Business::where('dealer_id', $request->dealer_id)->delete();
        return response()->json(['state'=>1]);
    }

    public function getBusiness(Request $request){
        $business=Business::find($request->id);
        return response()->json($business);
    }

    public function setApproved(Request $request){
        $business=Business::find($request->business_id);
        $business['is_approved']=$request->is_approved;
        $business->save();
        return response()->json(['state'=>1]);
    }
}
