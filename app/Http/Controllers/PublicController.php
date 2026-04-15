<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Application;
use App\Mail\ContactReceived;
use App\Mail\ApplicationReceived;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function home()
    {
        $services = Service::latest()->take(6)->get();
        $projects = Project::latest()->take(3)->get();
        $testimonials = Testimonial::latest()->take(5)->get();
        return view('home', compact('services', 'projects', 'testimonials'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    public function portfolio()
    {
        $projects = Project::latest()->paginate(9);
        return view('portfolio.index', compact('projects'));
    }

    public function portfolioShow(Project $project)
    {
        return view('portfolio.show', compact('project'));
    }

    public function careers()
    {
        return view('careers');
    }

    public function apply(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'field_of_interest' => 'required|string',
            'message' => 'required|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('cv')) {
            $path = $request->file('cv')->store('cvs', 'local');
            $validated['cv_path'] = $path;
        }

        $application = Application::create($validated + ['status' => 'pending']);

        // Send confirmation email to applicant
        Mail::to($application->email)->send(new ApplicationReceived($application));
        
        // Notify admin
        Mail::to(config('mail.from.address'))->send(new ContactReceived([
            'name' => 'System Notification',
            'email' => 'noreply@cogear.agency',
            'subject' => 'New Career Application: ' . $application->name,
            'message' => 'A new application has been received for ' . $application->field_of_interest . '. Please check the admin panel to review.'
        ]));

        return back()->with('success', 'Your application has been submitted successfully! Please check your email for confirmation.');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::to(config('mail.from.address'))->send(new ContactReceived($validated));

        return back()->with('success', 'Your message has been sent successfully! We will contact you soon.');
    }

    public function testimonials()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('testimonials', compact('testimonials'));
    }
}
