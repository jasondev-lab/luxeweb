<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $menu='Products';
        $submenu='List';
        return view('pages.admin.products', compact('menu', 'submenu'));
    }

    public function getProducts(){
        $products=Product::where('category_id', '<>', 0)->get();
        for($i=0; $i<count($products); $i++){
            $category=Category::find($products[$i]['category_id']);
            $products[$i]['category']=empty($category) ? '' : $category['title'];
        }
        $result['data']=$products;
        for($i=0; $i<count($products); $i++){
            $products[$i]['image']=count($products[$i]['images'])==0 ? '' : $products[$i]['images'][0];
        }
        return json_encode($result);
    }

    public function newProduct(){
        $menu='Products';
        $submenu='New Product';
        $categories=Category::all();
        return view('pages.admin.new-product', compact('menu', 'submenu', 'categories'));
    }

    public function uploadProductImage(Request $request){
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png|max:20480',
        ]);

        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/products'), $image);                
                return response()->json(['state'=>1, 'image'=>$image]);
            }
        }
        
        return response()->json(['state'=>0]);
    }

    public function addProduct(Request $request){
        $input=$request->all();
        if($request->has('images')){
            $input['images']=json_decode($request->images, true);
        }

        if($request->has('status')){
            $input['status']=2;
        }else{
            $input['status']=1;
        }

        if($request->has('sold')){
            $input['sold']=1;
        }else{
            $input['sold']=0;
        }

        if($request->has('email_button')){
            $input['email_button']=1;
        }else{
            $input['email_button']=0;
        }

        if($request->has('etsy_button')){
            $input['etsy_button']=1;
        }else{
            $input['etsy_button']=0;
        }

        Product::create($input);

        return redirect('/admin/products');
    }

    public function editProduct($id){
        $menu='Products';
        $submenu='Edit Product';
        $product=Product::find($id);
        $categories=Category::all();
        return view('pages.admin.edit-product', compact('menu', 'submenu', 'product', 'categories'));
    }

    public function updateProduct(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'inventory' => 'required',
            'short_description' => 'required'
        ]);

        $product=Product::find($request->id);
        $product['name']=$request->name;
        $product['price']=$request->price;
        $product['inventory']=$request->inventory;
        $product['short_description']=$request->short_description;
        $product['full_description']=$request->full_description;
        $product['link']=$request->link;
        $product['etsy_link']=$request->etsy_link;
        $product['category_id']=$request->category_id;
        
        if($request->has('images')){
            $product['images']=json_decode($request->images, true);
        }

        if($request->has('status')){
            $product['status']=2;
        }else{
            $product['status']=1;
        }

        if($request->has('sold')){
            $product['sold']=1;
        }else{
            $product['sold']=0;
        }

        if($request->has('email_button')){
            $product['email_button']=1;
        }else{
            $product['email_button']=0;
        }

        if($request->has('etsy_button')){
            $product['etsy_button']=1;
        }else{
            $product['etsy_button']=0;
        }

        $product->save();

        return redirect('/admin/products');
    }

    public function deleteProduct(Request $request){
        Product::find($request->product_id)->delete();
        return response()->json(['state'=>1]);
    }

    public function viewItems()
    {
        $menu='Items';
        $submenu='List';
        return view('pages.admin.items', compact('menu', 'submenu'));
    }

    public function getItems(){
        $products=Product::where('category_id', 0)->get();
        $result['data']=$products;
        for($i=0; $i<count($products); $i++){
            $products[$i]['image']=count($products[$i]['images'])==0 ? '' : $products[$i]['images'][0];
        }
        return json_encode($result);
    }

    public function addItem(Request $request){
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png|max:20480',
            'name' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);

        $item=new Product();
        $item['name']=$request->name;
        $item['link']=$request->link;
        $item['short_description']=$request->description;
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/products'), $image);
                $images=array();
                array_push($images, $image);
                $item['images']=$images;
            }
        }
        $item['status']=2;
        $item->save();
        
        return response()->json(['state'=>1]);
    }

    public function getItem(Request $request){
        $item=Product::find($request->item_id);
        $item['image']=count($item['images'])==0 ? '' : $item['images'][0];
        return json_encode($item);
    }

    public function saveItem(Request $request){
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);

        $item=Product::find($request->item_id);
        $item['name']=$request->name;
        $item['link']=$request->link;
        $item['short_description']=$request->description;
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/products'), $image);
                $images=array();
                array_push($images, $image);
                $item['images']=$images;
            }
        }
        $item->save();
        
        return response()->json(['state'=>1]);
    }

    public function categories()
    {
        $menu='Categories';
        $submenu='List';
        $setting=Setting::where('meta_key', 'menu')->first();
        $result['menu']=empty($setting) ? [] : $setting['meta_value'];

        return view('pages.admin.categories', compact('menu', 'submenu', 'result'));
    }

    public function getCategories(){
        $categories=Category::all();
        $result['data']=$categories;
        return json_encode($result);
    }

    public function saveCategory(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        
        $input=$request->all();
        if($input['method']=='add'){
            Category::create($input);
        }else{
            $category=Category::find($input['category_id']);
            $category['title']=$input['title'];
            $category['description']=$input['description'];
            $category->save();
        }

        return response()->json(['state'=>1]);
    }

    public function getCategory(Request $request){
        $category=Category::find($request->category_id);
        return response()->json($category);
    }

    public function deleteCategory(Request $request){
        Category::find($request->delete_category_id)->delete();
        return response()->json(['state'=>1]);
    }
}
