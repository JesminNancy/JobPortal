<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use App\Models\CompanyLocation;
use App\Models\CompanyIndustry;
use App\Models\CompanySize;
use App\Models\Company;
use App\Models\CompanyPhoto;
use App\Models\CompanyVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\validation\Rule;
use Srmklive\PayPal\Services\PayPal as PayPalClient;



class CompanyController extends Controller
{
    public function dashboard(){
        return view('company.dashboard');
    }

    public function orders(){
        $orders = Order::with('rPackage')->orderBy('id', 'desc')->where('company_id',Auth::guard('company')->user()->id)->get();
        return view('company.order',compact('orders'));
    }

    public function edit_profile(){
        $company_locations = CompanyLocation::orderBy('name','asc')->get();
        $company_industries = CompanyIndustry::orderBy('name','asc')->get();
        $company_sizes = CompanySize::get();
        return view('company.company_edit_profile',compact('company_locations','company_industries','company_sizes'));
    }


    public function edit_profile_update(Request $request)
    {
        $obj = Company::where('id',Auth::guard('company')->user()->id)->first();
        $id = $obj->id;

        $request->validate([
            'company_name' => 'required',
            'person_name' => 'required',
            'username' => ['required','alpha_dash',Rule::unique('companies')->ignore($id)],
            'email' => ['required','email',Rule::unique('companies')->ignore($id)],
        ]);

        if($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if(Auth::guard('company')->user()->logo != '') {
                unlink('uploads/'.$obj->logo);
            }

            $ext = $request->file('logo')->extension();
            $final_name = 'company_logo_'.time().'.'.$ext;

            $request->file('logo')->move('uploads/',$final_name);

            $obj->logo = $final_name;
        }

        $obj->company_name = $request->company_name;
        $obj->person_name = $request->person_name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->address = $request->address;
        $obj->company_location_id = $request->company_location_id;
        $obj->company_industry_id = $request->company_industry_id;
        $obj->company_size_id = $request->company_size_id;
        $obj->founded_on = $request->founded_on;
        $obj->website = $request->website;
        $obj->description = $request->description;
        $obj->oh_mon = $request->oh_mon;
        $obj->oh_tue = $request->oh_tue;
        $obj->oh_wed = $request->oh_wed;
        $obj->oh_thu = $request->oh_thu;
        $obj->oh_fri = $request->oh_fri;
        $obj->oh_sat = $request->oh_sat;
        $obj->oh_sun = $request->oh_sun;
        $obj->map_code = $request->map_code;
        $obj->facebook = $request->facebook;
        $obj->twitter = $request->twitter;
        $obj->linkedin = $request->linkedin;
        $obj->instagram = $request->instagram;
        $obj->update();

        return redirect()->back()->with('success', 'Profile is updated successfully.');

    }

    public function photos(){

        $orders_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();

        if(!$orders_data){
            return redirect()->back()->with('error','You must have to buy a package first to access this page');
        }

        $package_data = Package::where('id',$orders_data->package_id)->first();

        if($package_data->total_allowed_photos == 0){
            return redirect()->back()->with('error','Your current package does not allow to access the photo');
        }

        $company_photos = CompanyPhoto::where('company_id',Auth::guard('company')->user()->id)->get();
        return view('company.company_photo',compact('company_photos'));
    }


    public function photos_submit(Request $request){
        $orders_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();

        $package_data = Package::where('id',$orders_data->package_id)->first();

        $existing_photo = CompanyPhoto::where('company_id',Auth::guard('company')->user()->id)->count();

        if($package_data->total_allowed_photos == $existing_photo){

            return redirect()->back()->with('error','Maximum photos are uploaded, you must have upgrade your package if you want to add more photo');

        }
        if(date('Y-m-d') > $orders_data->expire_date) {
            return redirect()->back()->with('error', 'Your package is expired!');
        }
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new CompanyPhoto();

        $ext = $request->file('photo')->extension();
        $final_name = 'company_photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj->photo = $final_name;
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->save();

        return redirect()->back()->with('success', 'Photo is saved successfully.');
    }
    public function photo_delete($id){
        $single_data = CompanyPhoto::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        CompanyPhoto::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Photo is deleted successfully.');

    }

    public function videos(){

        $orders_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();

        if(!$orders_data){
            return redirect()->back()->with('error','You must have to buy a package first to access this page');
        }

        $package_data = Package::where('id',$orders_data->package_id)->first();

        if($package_data->total_allowed_videos == 0){
            return redirect()->back()->with('error','Your current package does not allow to access the photo');
        }

        $videos = CompanyVideo::where('company_id',Auth::guard('company')->user()->id)->get();
        return view('company.company_video',compact('videos'));
    }
    public function videos_submit(Request $request){
        $orders_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();

        $package_data = Package::where('id',$orders_data->package_id)->first();

        $existing_video = CompanyVideo::where('company_id',Auth::guard('company')->user()->id)->count();

        if($package_data->total_allowed_videos == $existing_video){

            return redirect()->back()->with('error','Maximum videos are uploaded, you must have upgrade your package if you want to add more video');

        }
        if(date('Y-m-d') > $orders_data->expire_date) {
            return redirect()->back()->with('error', 'Your package is expired!');
        }
        $request->validate([
            'video_id' => 'required'
        ]);

        $obj = new CompanyVideo();

        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->video_id = $request->video_id;
        $obj->save();

        return redirect()->back()->with('success', 'Video is saved successfully.');
    }

    public function video_delete($id){
        CompanyVideo::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Video is deleted successfully.');
    }

    public function edit_password(){
        return view('company.company_edit_password');
    }
    public function edit_password_submit(Request $request){
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);
        $obj = Company::where('id',Auth::guard('company')->user()->id)->first();
        $obj->password = Hash::make($request->password);
        $obj->update();

        return redirect()->back()->with('success', 'Password is updated successfully.');
    }

    public function create_job(){

    }

    public function make_payment(){
        $current_plan = Order::with('rPackage')->where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();
        $packages = Package::get();
        return view('company.make_payment',compact('current_plan','packages'));
    }

    public function paypal(Request $request)
    {
        $single_package_data = Package::where('id',$request->package_id)->first();

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('company_paypal_success'),
                "cancel_url" => route('company_paypal_cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $single_package_data->package_price
                    ]
                ]
            ]
        ]);

        if(isset($response['id']) && $response['id']!=null){
            foreach($response['links'] as $link){
                if($link['rel'] === 'approve'){

                    session()->put('package_id',$single_package_data->id);
                    session()->put('package_price',$single_package_data->package_price);
                    session()->put('package_days',$single_package_data->package_days);

                    return redirect()->away($link['href']);
                }
            }
        }else{
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function paypal_success(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        // dd($response);


        if(isset($response['status']) && $response['status'] == 'COMPLETED'){

            $data['currently_active'] = 0;

            Order::where('company_id',Auth::guard('company')->user()->id)->update($data);

            $obj = new Order();
            $obj->company_id =Auth::guard('company')->user()->id;
            $obj->package_id = session()->get('package_id');
            $obj->order_no = time();
            $obj->paid_amount = session()->get('package_price');
            $obj->payment_method ='Paypal';
            $days = session()->get('package_days');
            $obj->start_date = date('Y-m-d');
            $obj->expire_date = date('Y-m-d',strtotime("+$days days"));
            $obj->currently_active = 1;
            $obj->save();

            session()->forget('package_id');
            session()->forget('package_price');
            session()->forget('package_days');

            return redirect()->route('company_make_payment')->with('success','Payment is successfully');
        }else{
            return redirect()->route('company_paypal_cancel');
        }

    }

    public function paypal_cancel(){
        return redirect()->route('company_make_payment')->with('error','Payment is cancelled');
    }


    public function stripe(Request $request)
    {
        $single_package_data = Package::where('id',$request->package_id)->first();

        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));
        $response = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $single_package_data->package_name
                        ],
                        'unit_amount' => $single_package_data->package_price * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('company_stripe_success'),
            'cancel_url' => route('company_stripe_cancel'),
        ]);

        session()->put('package_id', $single_package_data->id);
        session()->put('package_price', $single_package_data->package_price);
        session()->put('package_days', $single_package_data->package_days);

        return redirect()->away($response->url);

    }

    public function stripe_success()
    {
        $data['currently_active'] = 0;
        Order::where('company_id', Auth::guard()->user()->id)->update($data);

        $obj = new Order();
        $obj->company_id = Auth::guard()->user()->id;
        $obj->package_id = session()->get('package_id');
        $obj->order_no = time();
        $obj->paid_amount = session()->get('package_price');
        $obj->payment_method = 'Stripe';
        $obj->start_date = date('Y-m-d');
        $days = session()->get('package_days');
        $obj->expire_date = date('Y-m-d', strtotime("+$days days"));
        $obj->currently_active = 1;
        $obj->save();

        session()->forget('package_id');
        session()->forget('package_price');
        session()->forget('package_days');

        return redirect()->route('company_make_payment')->with('success', 'Payment is successful!');
    }

    public function stripe_cancel()
    {
        return redirect()->route('company_make_payment')->with('error', 'Payment is cancelled!');
    }

}
