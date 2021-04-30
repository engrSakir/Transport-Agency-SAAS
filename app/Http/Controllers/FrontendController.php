<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CallToAction;
use App\Models\CustomPage;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\HomeContent;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Price;
use App\Models\Service;
use App\Models\Strength;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WebsiteMessage;
use App\Models\WebsiteSubscribe;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $partners = Partner::orderBy('id', 'desc')->get();
        $home_contents = HomeContent::where('is_active', true)->orderBy('serial', 'asc')->get();
        $strengths = Strength::orderBy('id', 'desc')->get();
        $services = Service::orderBy('id', 'desc')->get();
        $faqs = Faq::orderBy('id', 'desc')->get();
        $callToActions = CallToAction::where('is_active', true)->get();
        $portfolioCategories = PortfolioCategory::orderBy('id', 'desc')->get();
        $teams = Team::orderBy('id', 'desc')->get();
        $prices = Price::where('is_active', true)->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        return view('frontend.index', compact('partners',
            'home_contents',
            'strengths',
            'services',
            'faqs',
            'callToActions',
            'portfolioCategories',
            'teams',
            'prices',
            'testimonials'));
    }

    public function gallery(){
        $images = Gallery::orderBy('id', 'desc')->get();
        return view('frontend.gallery', compact('images'));
    }

    public function portfolio($slug){
        $portfolio = Portfolio::where('slug', $slug)->where('is_active', true)->first();
        return view('frontend.portfolio', compact('portfolio'));
    }

    public function page($slug){
        $page = CustomPage::where('slug', $slug)->where('is_active', true)->first();
        return view('frontend.page', compact('page'));
    }

    public function blogs(){
        $blogs = Blog::orderBy('id', 'desc')->where('is_active', true)->get();
        return view('frontend.blogs', compact('blogs'));
    }

    public function blogDetail($slug){
        $blog = Blog::where('slug', $slug)->where('is_active', true)->first();
        return view('frontend.blog-detail', compact('blog'));
    }

    public function contactMessageStore(Request $request){
        $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
            'email' => 'required|string',
            'phone'   => 'required|string',
            'message'   =>  'required|string',
        ]);
        $message = new WebsiteMessage();
        $message->name   = $request->name;
        $message->email   = $request->email;
        $message->subject   = $request->subject;
        $message->phone = $request->phone;
        $message->message = $request->message;

        try {
            $message->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully sent your message'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'success',
                'message' => 'Something going wrong. '.$exception->getMessage()
            ]);
        }
    }

    public function subscribeStore(Request $request){
        $request->validate([
            'email'=> 'required|email'
        ]);
        if(WebsiteSubscribe::where('email',$request->email)->exists()){
            return response()->json([
                'type' => 'success',
                'message' => 'Already Subscribed !',
            ]);
        }

        $subscribe = new WebsiteSubscribe();
        $subscribe->email = $request->email;
        try {
            $subscribe->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully Subscribed !.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong. '.$exception->getMessage(),
            ]);
        }
    }
}
