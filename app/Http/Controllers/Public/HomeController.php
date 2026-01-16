<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home', [
            'business' => MockData::businessInfo(),
            'programs' => MockData::programs(),
            'testimonials' => MockData::testimonials(),
            'staff' => MockData::staff(),
            'fees' => MockData::fees(),
            'services' => MockData::services(),
            'faqs' => MockData::faqs(),
            'trustBadges' => MockData::trustBadges(),
        ]);
    }

    public function programs()
    {
        return view('public.programs', [
            'business' => MockData::businessInfo(),
            'programs' => MockData::programs(),
        ]);
    }

    public function programDetail($slug)
    {
        $programs = MockData::programs();
        $program = collect($programs)->firstWhere('id', $slug);

        return view('public.program-detail', [
            'business' => MockData::businessInfo(),
            'program' => $program,
            'programs' => $programs,
        ]);
    }

    public function about()
    {
        return view('public.about', [
            'business' => MockData::businessInfo(),
            'staff' => MockData::staff(),
        ]);
    }

    public function fees()
    {
        return view('public.fees', [
            'business' => MockData::businessInfo(),
            'fees' => MockData::fees(),
            'faqs' => MockData::faqs(),
        ]);
    }

    public function contact()
    {
        return view('public.contact', [
            'business' => MockData::businessInfo(),
        ]);
    }

    public function submitContact()
    {
        return redirect()->route('contact')->with('success', 'Thank you for your message. We will be in touch soon!');
    }

    public function faq()
    {
        return view('public.faq', [
            'business' => MockData::businessInfo(),
            'faqs' => MockData::faqs(),
        ]);
    }

    public function gallery()
    {
        return view('public.gallery', [
            'business' => MockData::businessInfo(),
        ]);
    }

    public function bookTour()
    {
        return view('public.book-tour', [
            'business' => MockData::businessInfo(),
        ]);
    }

    public function submitTour()
    {
        return redirect()->route('book-tour')->with('success', 'Tour booked successfully! We will confirm your appointment shortly.');
    }
}
