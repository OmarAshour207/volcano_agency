<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Contactus;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\HotelOffer;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Trip;
use App\Models\Visitor;
use App\Models\WebsiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function changeLanguage($language)
    {
        session()->has('lang') ? session()->forget('lang') : '';
        $language == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return redirect()->back();
    }

    public function HomePage()
    {
//        dd(\request()->segment(1));
        $this->checkVisitor();

        session('lang') ?? session()->put('lang', app()->getLocale());
        $websiteSettings = WebsiteSetting::first();
        $page_filter = $websiteSettings->page_filter != null ? unserialize($websiteSettings->page_filter) : '';
        $aboutUs = About::first();
        $contactUs = Contactus::first();
        $projects = Project::orderBy('id', 'desc')->limit(3)->get();
        $services = Service::orderBy('id', 'desc')->limit(6)->get();
        $teamMembers = TeamMember::orderBy('id', 'desc')->limit(4)->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->limit(3)->get();
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $themeName = getThemeName();
        $sliders = Slider::orderBy('id', 'desc')->limit(3)->get();

        $offers = HotelOffer::with('hotel')->orderBy('id', 'desc')->limit(4)->get();
        $flights = Flight::orderBy('id', 'desc')->limit(6)->get();
        $trips = Trip::orderBy('id', 'desc')->limit(4)->get();
        $hotels = Hotel::select('ar_name', 'en_name')->orderBy('id', 'desc')->get();

        $services_count = Service::all()->count();
        $projects_count = Project::all()->count();
        $team_count = TeamMember::all()->count();


        return view('site.' . $themeName . '.home',
                    compact('page_filter', 'sliders',
                            'aboutUs', 'contactUs', 'projects',
                            'services', 'teamMembers',
                            'testimonials', 'blogs',
                            'services_count', 'projects_count',
                            'team_count', 'offers',
                            'flights', 'trips', 'hotels'));
    }

    public function checkVisitor()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $page = \Request::segment(1) ?? 'home';

        $visitors = DB::table('visitors')
                ->where('ip', $ip)
                ->where('page', $page)
                ->latest()
                ->first();

        if($visitors != null) {
            $created = Carbon::parse($visitors->created_at);

            if(!$created->isCurrentDay()) {
                $this->createVisitor($ip, $page);
            }
        }else {
            $this->createVisitor($ip, $page);
        }
    }

    protected function createVisitor($ip, $page)
    {
        Visitor::create([
            'ip'    => $ip,
            'page'  => $page
        ]);
    }

    public function aboutPage()
    {
        $this->checkVisitor();
        $aboutUs = About::first();
        $name = getThemeName();
        $teamMembers = TeamMember::orderBy('id', 'desc')->limit(5)->get();
        $services = Service::orderBy('id', 'desc')->limit(6)->get();

        return view('site.' . $name . '.about',
            compact('aboutUs', 'teamMembers',
                            'services'));
    }

    public function blogsPage()
    {
        $this->checkVisitor();
        $blogs = Blog::paginate(4);
        $services = Service::orderBy('id', 'desc')->limit(6)->get();
        $aboutUs = About::first();

        return view('site.' . getThemeName() . '.blogs', compact('blogs', 'services' , 'aboutUs'));
    }

    public function showBlog($id, $title)
    {
        $blog = Blog::findOrFail($id);
        $aboutUs = About::first();
        $services = Service::orderBy('id', 'desc')->limit(6)->get();
        $recent_blogs = Blog::orderBy('id', 'desc')->limit(3)->get();

        return view('site.' . getThemeName() . '.single_blog',
            compact('blog', 'aboutUs','services', 'recent_blogs'));
    }

    public function projectsPage()
    {
        $this->checkVisitor();
        $projects = Project::orderBy('id', 'desc')->paginate(6);
        $aboutUs = About::first();
        $services = Service::orderBy('id', 'desc')->limit(6)->get();

        return view('site.' . getThemeName() . '.projects', compact('projects', 'aboutUs', 'services'));
    }

    public function servicesPage()
    {
        $this->checkVisitor();
        $name = getThemeName();
        $services = Service::orderBy('id', 'desc')->paginate(6);

        $contactUs = Contactus::first();
        $aboutUs = About::first();

        return view('site.' . $name . '.services', compact('services', 'contactUs', 'aboutUs'));
    }

    public function contact()
    {
        $this->checkVisitor();

        $contactUs = Contactus::first();
        $services = Service::orderBy('id', 'desc')->limit(6)->get();
        $aboutUs = About::first();

        return view('site.' . getThemeName() . '.contact', compact('contactUs', 'services', 'aboutUs'));
    }

}
