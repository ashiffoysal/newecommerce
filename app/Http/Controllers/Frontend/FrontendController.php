<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\ThemeSelector;
use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\OrderPlace;
use App\Category;
use App\SubCategory;
use App\FlashDeal;
use App\ReSubCategory;
use App\Color;
use App\ProductReview;
use App\FlashDealDetail;
use App\Blog;
use App\BlogComment;
use App\Banner;
use App\Faq;
use App\Warranty;
use Image;
use App\CustomarAccount;
use App\ViewedProduct;
use App\SiteBanner;
use App\Page;
use Carbon\Carbon;
use DB;
use Auth;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Session;


class FrontendController extends Controller
{
    // Frontend showing page
    public function index()
    {


        $themecheck = ThemeSelector::where('status', 1)->first();
        if($themecheck->id==1){

            $firstcate=Category::where('cate_status',1)->where('is_deleted',0)->first();
            $secondcate=Category::where('cate_status',1)->where('is_deleted',0)->skip(1)->first();
            $thirdcate=Category::where('cate_status',1)->where('is_deleted',0)->skip(2)->first();
            $newproduct=Product::where('is_deleted',0)->orderBy('id','DESC')->limit(6)->get();
            $slider=Banner::where('theme_id',1)->where('is_deleted',0)->where('ban_status',1)->orderBy('id','DESC')->limit(3)->get();
            //$hot_deal=FlashDeal::where('status',1)->where('is_deleted',0)->first();
            // hot deal start
               date_default_timezone_set('Asia/Dhaka');
                $to = Carbon::now()->format('Y-m-d');
                $from = date('Y-m-d', strtotime('+30 days', strtotime($to)));
                $hotdeal = FlashDeal::with(['flash_deal_details', 'flash_deal_details.product'])
                ->where('status', 1)
                ->where('is_deleted', 0)
                ->select('id', 'start_date', 'end_date')
                ->orderBy('id', 'DESC')
                ->first();
                 
            if ($hotdeal) {
                if ($hotdeal->end_date == date('Y-m-d')) {
                    foreach ($hotdeal->flash_deal_details as $value) {
                        $value->update([
                            'status' => 0,
                        ]);
                    }
                    $hotdeal->update([
                        'status' => 0
                    ]);
                }
            }
            $homban1=SiteBanner::where('section',1)->where('is_deleted',0)->select(['image','link'])->where('status',1)->inRandomOrder()->limit(2)->get();
            $hommiddle=SiteBanner::where('section',3)->where('is_deleted',0)->select(['image','link'])->where('status',1)->inRandomOrder()->limit(3)->get();

            $homefoot1=SiteBanner::where('section',4)->where('is_deleted',0)->select(['image','link'])->where('status',1)->inRandomOrder()->limit(1)->get();

            $homefoot2=SiteBanner::where('section',5)->where('is_deleted',0)->select(['image','link'])->where('status',1)->inRandomOrder()->limit(1)->get();
            // hotdeal end
            return view('frontend.home.home1',compact('homefoot2','homefoot1','hommiddle','homban1','slider','firstcate','secondcate','thirdcate','newproduct','hotdeal'));
        }
        elseif($themecheck->id==2){
            return view('frontend.home.home2');
        }
        elseif($themecheck->id==3){

            return view('frontend.home.home3');
        }
        elseif($themecheck->id==4){

            return view('frontend.home.home4');
        }
        elseif($themecheck->id==5){

            return view('frontend.home.home5');
        }
        elseif($themecheck->id==6){

            return view('frontend.home.home6');
        }
        elseif($themecheck->id==7){

            return view('frontend.home.home7');
        }
        elseif($themecheck->id==8){

            return view('frontend.home.home8');
        }
         elseif($themecheck->id==9){
            $theme=ThemeSelector::where('status',1)->first();
            $banner=Banner::where('ban_status',1)->where('is_deleted',0)->where('theme_id',$theme->id)->orderBy('id','DESC')->limit(3)->get();

            $middleban=SiteBanner::where('is_deleted',0)->where('status',1)->where('section',6)->orderBy('id','DESC')->limit(2)->get();

            $topsell=Product::where('is_deleted',0)->orderBy('number_of_sale','DESC')->limit(4)->get();
            $topsellskip=Product::where('is_deleted',0)->orderBy('number_of_sale','DESC')->skip(4)->limit(4)->get();

            $firstcate=Category::where('cate_status',1)->where('is_deleted',0)->first();
            $secondcate=Category::where('cate_status',1)->where('is_deleted',0)->skip(1)->first();

            $allcate=Category::where('cate_status',1)->where('is_deleted',0)->orderBy('id','DESC')->limit(6)->get();
            $newarrival=Product::where('is_deleted',0)->orderBy('id','DESC')->limit(10)->get();

               date_default_timezone_set('Asia/Dhaka');
                $to = Carbon::now()->format('Y-m-d');
                $from = date('Y-m-d', strtotime('+30 days', strtotime($to)));
                $hotdeal = FlashDeal::with(['flash_deal_details', 'flash_deal_details.product'])
                ->where('status', 1)
                ->where('is_deleted', 0)
                ->select('id', 'start_date', 'end_date')
                ->orderBy('id', 'DESC')
                ->first();

                 
            if ($hotdeal) {
                if ($hotdeal->end_date == date('Y-m-d')) {
                    foreach ($hotdeal->flash_deal_details as $value) {
                        $value->update([
                            'status' => 0,
                        ]);
                    }
                    $hotdeal->update([
                        'status' => 0
                    ]);
                }

                
            }

            return view('frontend.home.home9',compact('middleban','banner','topsell','topsellskip','firstcate','secondcate','allcate','newarrival','hotdeal'));

        }

        elseif($themecheck->id==10){

            return view('frontend.home.home10');
        }
        elseif($themecheck->id==11){

            return view('frontend.home.home11');
        }
        else{
            return "upcomming Theme";
        }
     
    }

    // About us page show
    public function aboutus()
    {
        SEOMeta::setTitle('About Us');
        SEOMeta::setDescription('Durbar It Ecommerce Website About Us Page');
        // SEOMeta::setCanonical('https://codecasts.com.br/lesson');

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('Home');
        $curl= url()->current();
        OpenGraph::setUrl($curl);
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Homepage');
        TwitterCard::setSite('@LuizVinicius73');

        JsonLd::setTitle('Homepage');
        JsonLd::setDescription('This is my page description');
        JsonLd::addImage('https://codecasts.com.br/img/logo.jpg');

        return view('frontend.pages.about');
    }

    public function faqpage()
    {
        $allfaq=Faq::where('is_deleted',0)->where('faq_status',1)->orderBy('id','DESC')->get();
        return view('frontend.pages.faq',compact('allfaq'));
    }
    // support
    public function supportpage()
    {
        return view('frontend.support.support');
    }

    public function warrantypage()
    {   $allwarranty=Warranty::where('status',1)->where('is_deleted',0)->orderBy('id','DESC')->get();
        return view('frontend.pages.warranty',compact('allwarranty'));
    }

    // Category page show
    public function cateproduct($slug)
    {
        $category = Category::where('cate_slug', $slug)->first();

        $allcategory = Category::where('cate_status',1)->where('is_deleted',0)->get();

        $cateid=$category->id;
        $productcount=Product::where('is_deleted',0)->where('cate_id',$cateid)->orderBy('id','DESC')->count();

        $allproduct=Product::where('is_deleted',0)->where('cate_id',$cateid)->orderBy('id','DESC')->simplePaginate(12);

        $productbestsell=Product::where('is_deleted',0)->where('cate_id',$cateid)->orderBy('number_of_sale','DESC')->limit(15)->get();
        $allbrand=Brand::where('is_deleted',0)->where('brand_status',1)->get();

        //dd($productbestsell);
        return view('frontend.products.product_list', compact('category','allcategory','productcount','allproduct','productbestsell','allbrand'));
    }

    // subcategory show
    public function subcateproduct($cate_slug, $subcate_slug)
    {
        $subcate = SubCategory::where('subcate_slug', $subcate_slug)->first();
        //return $subcate->id;
        $allcategory = Category::where('cate_status',1)->where('is_deleted',0)->get();
        $cateid=$subcate->id;

        $productcount=Product::where('is_deleted',0)->where('subcate_id',$cateid)->orderBy('id','DESC')->count();
        $allproduct=Product::where('is_deleted',0)->where('subcate_id',$cateid)->orderBy('id','DESC')->simplePaginate(12);
        $productbestsell=Product::where('is_deleted',0)->where('subcate_id',$cateid)->orderBy('number_of_sale','DESC')->limit(15)->get();
        $allbrand=Brand::where('is_deleted',0)->where('brand_status',1)->get();

        return view('frontend.products.subcate',compact('subcate','allcategory','productcount','allproduct','productbestsell','allbrand'));
    }
    // resubcate product
    public function resubcateproduct($cate_slug, $subcate_slug, $resub_slug)
    {
        $resubcate=ReSubCategory::where('resubcate_slug',$resub_slug)->first();
        $allcategory = Category::where('cate_status',1)->where('is_deleted',0)->get();
        $cateid=$resubcate->id;
        $productcount=Product::where('is_deleted',0)->where('resubcate_id',$cateid)->orderBy('id','DESC')->count();
        $allproduct=Product::where('is_deleted',0)->where('resubcate_id',$cateid)->orderBy('id','DESC')->simplePaginate(12);
        $productbestsell=Product::where('is_deleted',0)->where('resubcate_id',$cateid)->orderBy('number_of_sale','DESC')->limit(15)->get();
        $allbrand=Brand::where('is_deleted',0)->where('brand_status',1)->get();

        return view('frontend.products.resubcate', compact('resubcate','allcategory','productcount','allproduct','productbestsell','allbrand'));
    }





    public function productWishlist()
    {
        return view('frontend.shopping.wishlist');
    }

    // // Customer Login page show
    // public function customerLogin ()
    // {
    //     return view('frontend.accounts.login');
    // }


    // // Customer Register page show
    // public function customerRegister ()
    // {
    //     return view('frontend.accounts.register');
    // }

    // Customer Account page show
    // public function customerAccount ()
    // {
    //     return view('frontend.accounts.account');
    // }

    // customer Order page show
    public function customerOrder()
    {
        $user_id = Auth::id();
        $history = OrderPlace::where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(5);
        return view('frontend.accounts.order_history', compact('history'));
    }


    // customer Order information page show
    public function customerOrderInfo($id)
    {
        $orderplaceid = OrderPlace::where('id', $id)->first();
        return view('frontend.accounts.order_information', compact('orderplaceid'));
    }

    // Customer Order Return page show
    public function customerOrderReturn()
    {
        return view('frontend.accounts.product_return');
    }

    // Customer gift voucher Return page show
    public function customerGiftVoucher()
    {
        return view('frontend.accounts.gift_voucher');
    }

    // product view single
    // modal
    public function productmodal($id)
    {
        return "ok";
        $productdetails = Product::where('id', $id)->first();
        return view('frontend.products.productmodal', compact('productdetails'));
    }

    // price show variant wise
    public function provarient(Request $request)
    {
        

        $product = Product::find($request->id);

        $str = '';
        $quantity = 0;

        if ($request->has('color')) {
            $data['color'] = $request['color'];
            $str = Color::where('color_code', $request['color'])->first()->color_name;
        }

        foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
            if ($str != null) {
                $str .= '-' . str_replace(' ', '', $request[$choice->name]);
            } else {
                $str .= str_replace(' ', '', $request[$choice->name]);
            }
        }

        if ($str != null) {
            $price = json_decode($product->variations)->$str->price;
            $sku = json_decode($product->variations)->$str->sku;
        } else {
            $price = $product->product_price;
            $sku = $product->product_sku;
        }
        return array('price' => $price, 'sku' => $sku);
    }


    public function searchcate()
    {
        $new = $_GET['search_content'];
        $productsearch = Product::where('product_sku', 'LIKE', '%' . $new . '%')->orderBy('id', 'DESC')->get();
        // return json_encode($productsearch);
        return view('frontend.products.search', compact('productsearch'));
    }


    public function flashDealProducts()
    {
       $flash_deal = FlashDeal::where('status', 1)->where('is_deleted', 0)->select('id', 'end_date')->first();
        $flash_deal_details = 0;
        if ($flash_deal) {
            $flash_deal_details = FlashDealDetail::with('product')->where('flash_deal_id', $flash_deal->id)->paginate(16);
        }
        $allproduct=Product::where('is_deleted',0)->where('status',1)->orderBy('id','DESC')->limit(12)->get();
        return view('frontend.products.hotdeals', compact('flash_deal', 'flash_deal_details','allproduct'));
    }


    // tracking
    public function tracking()
    {
      
        return view('frontend.pages.order_tracking');
    }


    public function pagecreate($id){
        $pagedetails=Page::where('id',$id)->first();
        return view('frontend.pages.createpage',compact('pagedetails'));
    }
    //
    public function ordertracking(Request $request)
    {
        $orderid = $request->order_id;
        $trackingresult = OrderPlace::where('order_id', $orderid)->first();
        return view('frontend.pages.trackresult', compact('trackingresult'));
    }
    // product review
    public function productreview(Request $request)
    {
        //return $request;
        $insert = ProductReview::insertGetId([
            'name' => $request['name'],
            'description' => $request['description'],
            'review' => $request['review'],
            'product_id' => $request['product_id'],
            'email' => $request['email'],
        ]);
        if ($insert) {
            $notification = array(
                'messege' => 'Your Review Has been Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Your Review Has been Faild,Please try Again!!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // blog
    public function allblog(){
        $blogs=Blog::where('is_deleted',0)->where('status',1)->orderBy('id','DESC')->paginate(5);
        $recentblog=Blog::orderBy('id','DESC')->limit(10)->get();

        return view('frontend.blog.blog',compact('blogs','recentblog'));
    }

    // 
    public function blogdetails($id){
        $blogs=Blog::where('id',$id)->first();

        $allnewproduct=Product::orderBy('id','DESC')->limit(12)->get();
        return view('frontend.blog.blogdetails',compact('blogs','allnewproduct'));
    }

    // 
    public function blogcomment(Request $request){
        $id=$request->id;
        $comment=BlogComment::insertGetId([
            'blog_id'=>$request['id'],
            'name'=>$request['name'],
            'email'=>$request['email'],
            'comment'=>$request['comment'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($comment){
            $notification = array(
                'messege' => 'comment Success',
                'alert-type' =>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'comment faild',
                'alert-type' =>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }


    /**
     * Showing Account information page.
     *
     * @var string
     */

     public function showAccountInfoPage()
     {
        
         return view('frontend.accounts.account');
     }

     /**
     * insert showed products id.
     *
     * @var string
     */

     public function showedProduct($id)
     {
         
        // work for viewed products
        $data = array();
        array_push($data,$id);

        $viewed = ViewedProduct::where('user_id',\Request::ip())->first();
        if($viewed){
            foreach (json_decode($viewed->products) as$value) {
                    array_push($data,$value,$id);
                
            }
            $data = array_unique($data);
            $productcount =count($data);

            if($productcount > 5){
                array_pop($data);
            }
            $viewed->update([
                'products'=>json_encode($data),
            ]);

        }else{
            ViewedProduct::insert([
                'user_id'=>\Request::ip(),
                'products'=>json_encode($data),
                'created_at'=>Carbon::now(),
            ]);
        }

     }


     /**
     * Showing product details page.
     *
     * @var string
     */
     
    public function productDetails($slug, $id)
    {

        $productdetails = Product::where('id', $id)
        ->select(['id', 'product_name', 'thumbnail_img', 'photos', 'slug', 'cate_id', 'product_qty', 'product_price', 'product_type', 'product_sku','select_upload_type','upload_file','upload_link','license_type','license_key','license_quantity','license_duration','brand', 'choice_options', 'colors', 'product_description', 'video','photos','created_at'])
        ->first();


        $this->showedProduct($id);
        
       

        
        

        // end viewed products

        date_default_timezone_set("Asia/Dhaka");
        $currentdate = date('Y-m-d');

        // $productdetails = Product::where('id', $id)
        // ->select(['id', 'product_name', 'thumbnail_img', 'photos', 'slug', 'cate_id', 'product_qty', 'product_price', 'product_type', 'product_sku','select_upload_type','upload_file','upload_link','license_type','license_key','license_quantity','license_duration','brand', 'choice_options', 'colors', 'product_description', 'video','photos'])
        // ->first();

        $checkFlashDeal = 0;
        $flashDeal = FlashDeal::where('status', 1)->select('id', 'end_date')->first();

        

        $productbestsell=Product::where('is_deleted',0)->orderBy('number_of_sale','DESC')->limit(7)->get();

        
        $relatedproduct=Product::where('is_deleted',0)->where('cate_id',$productdetails->cate_id)->limit(9)->get();


        $flashDealEndDate = $flashDeal->end_date;
        $countdowndate =date_format($flashDealEndDate,"F d, Y H:i:s");
        if ($flashDeal && $flashDealEndDate >= $currentdate ) {
            $flashDealDetails = FlashDealDetail::where('product_id', $id)->where('flash_deal_id', $flashDeal->id)->where('status', 1)->first();
        
            if ($flashDealDetails) {
                $checkFlashDeal = 1;
            }
            return view('frontend.products.product_details', compact('relatedproduct','productbestsell','productdetails', 'checkFlashDeal', 'flashDealEndDate','flashDealDetails','countdowndate'));
        } else {

            return view('frontend.products.product_details', compact('relatedproduct','productbestsell','productdetails', 'checkFlashDeal'));
        }
    }



    
    public function checkoutPage()
    {
        $items = \Cart::session(\Request::getClientIp(true))->getContent();

        if(count($items) == 0){
            $notification = array(
                'messege' => 'Please add some products!',
                'alert-type' =>'success'
            );
            return redirect('/')->with($notification);
        } 
        $customar =CustomarAccount::where('userid',auth()->user()->id)->first();
        
        if(!$customar){
            $notification = array(
                'messege' => 'Please Add Your User Info!',
                'alert-type' =>'success'
            );
            return redirect()->route('customar.address.page')->with($notification);
        }
        $items = \Cart::session(\Request::getClientIp(true))->getContent();
        return view('frontend.shipping.checkout',compact('customar','items'));
    }


    public function userAddress()
    {
        $useraddr =CustomarAccount::where('userid',auth()->user()->id)->first();
        if($useraddr){
            return view('frontend.accounts.address',compact('useraddr'));
        }else{
            return view('frontend.accounts.address');
        }
    }

    public function createAddress(Request $request)
    {
   
        $id=auth()->user()->id;
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        $useraddr =CustomarAccount::where('userid',auth()->user()->id)->first();
   
            if($request->has('image')){
                $image=$request->file('image');
                $imageName='img_'.$id.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(92,92)->save('public/uploads/customer/'.$imageName);
                User::where('id',$id)->update([
                    'avatar'=>$imageName,
                ]);
            }
        //return $useraddr;
        if($useraddr){
            $update=$useraddr->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'userid'=>auth()->user()->id,
                'updated_at'=>Carbon::now(),
            ]);
            $notification = array(
                'messege' => 'Address Updated successful!',
                'alert-type' =>'success'
            );

        }else{
            CustomarAccount::insertGetId([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'userid'=>auth()->user()->id,
                'created_at'=>Carbon::now(),
            ]);
                $notification = array(
                    'messege' => 'Address Create successful!',
                    'alert-type' =>'success'
                );
        }
        

        return back()->with($notification);
    }


    public function viewedProductPage()
    {
        
        $viewed = ViewedProduct::where('user_id',\Request::ip())->first();
        
        $viewedproduct=array();
        foreach(json_decode($viewed->products) as $row){
            
          
                
                $product =Product::where('id',$row)->first();
                 if($product){
                
                    
                    $item['id']=$product->id;
                    $item['name']=$product->product_name;
                    $item['photo']=$product->thumbnail_img;
                    $item['slug']=$product->slug;
                    $item['price']=$product->product_price;
                    
                    array_push($viewedproduct, $item);
                    
                }
            

            
            



            
           
        } 

     

        

        
        return view('frontend.shipping.viewed_products',compact('viewedproduct'));
    }
   


   public function shop(){
    $allproduct=Product::where('is_deleted',0)->orderBy('id','DESC')->paginate(16);
    $productcount=Product::where('is_deleted',0)->orderBy('id','DESC')->count();
    $allbrand=Brand::where('is_deleted',0)->where('brand_status',1)->get();
    return view('frontend.products.shop',compact('allproduct','productcount','allbrand'));
   }

    
}
