<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class PortalController extends Controller
{
    private function getCurrentParent()
    {
        // Mock: Return first enrolled child's parent info
        $children = MockData::enrolledChildren();
        return $children[0];
    }

    public function index()
    {
        $parent = $this->getCurrentParent();
        $children = MockData::enrolledChildren();

        return view('parent.dashboard', [
            'parent' => [
                'name' => 'Sarah Thompson',
                'first_name' => 'Sarah',
                'last_name' => 'Thompson',
                'email' => 'sarah.thompson@email.com',
                'phone' => '082 898 9967',
            ],
            'children' => $children,
            'announcements' => [
                ['type' => 'important', 'date' => 'Today', 'title' => 'School Photo Day', 'content' => 'Professional photographer will be here tomorrow. Please ensure children wear school uniform.'],
                ['type' => 'event', 'date' => 'Jan 24', 'title' => 'Field Trip - Aquarium', 'content' => 'Permission slips must be returned by Friday.'],
                ['type' => 'general', 'date' => 'Jan 20', 'title' => 'Parent Meeting', 'content' => 'Parent-teacher meetings scheduled for next Wednesday.'],
            ],
            'upcomingEvents' => [
                ['title' => 'School Photo Day', 'date' => date('Y-m-d', strtotime('tomorrow')), 'time' => '09:00 - 12:00', 'type' => 'event'],
                ['title' => 'Field Trip - Aquarium', 'date' => '2026-01-24', 'time' => '09:00 - 14:00', 'type' => 'event', 'description' => 'Two Oceans Aquarium visit'],
                ['title' => 'Parent-Teacher Meetings', 'date' => '2026-01-29', 'time' => '16:00 - 18:00', 'type' => 'event'],
            ],
            'accountSummary' => [
                'monthly_fee' => 4200,
                'last_payment' => 4600,
                'last_payment_date' => 'Jan 5, 2026',
                'balance' => 0,
                'next_due' => '1 Feb 2026',
            ],
            'albums' => [
                ['title' => 'Ocean Art Activity', 'date' => 'Today', 'photo_count' => 12, 'photos' => [
                    ['src' => 'assets/img/testimonial/testi-1-1.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-2.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-3.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-1.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-2.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-3.jpg'],
                ]],
            ],
        ]);
    }

    public function children()
    {
        return view('parent.children', [
            'children' => MockData::enrolledChildren(),
        ]);
    }

    public function childDetail($id)
    {
        $children = MockData::enrolledChildren();
        $child = collect($children)->firstWhere('id', $id) ?? $children[0];

        return view('parent.child-detail', [
            'child' => $child,
            'attendance' => MockData::attendance(),
        ]);
    }

    public function calendar()
    {
        return view('parent.calendar', [
            'upcomingEvents' => [
                ['title' => 'School Photo Day', 'date' => date('Y-m-d', strtotime('tomorrow')), 'time' => '09:00 - 12:00', 'type' => 'event'],
                ['title' => 'Field Trip - Aquarium', 'date' => '2026-01-24', 'time' => '09:00 - 14:00', 'type' => 'event', 'description' => 'Two Oceans Aquarium visit'],
                ['title' => 'Parent-Teacher Meetings', 'date' => '2026-01-29', 'time' => '16:00 - 18:00', 'type' => 'event'],
                ['title' => 'School Closed', 'date' => '2026-01-12', 'time' => 'All day', 'type' => 'holiday'],
            ],
        ]);
    }

    public function newsletters()
    {
        return view('parent.newsletters', [
            'newsletters' => [
                ['title' => 'January Newsletter', 'category' => 'Monthly', 'date' => 'Jan 15, 2026', 'excerpt' => 'Welcome back! Here\'s what\'s happening this month at Peekaboo...', 'is_new' => true, 'content' => '<h4>Welcome Back!</h4><p>We hope you all had a wonderful holiday. This month we\'re focusing on ocean themes and water safety.</p>'],
                ['title' => 'Important Updates', 'category' => 'Announcement', 'date' => 'Jan 10, 2026', 'excerpt' => 'Important information about upcoming field trips and schedule changes...', 'is_new' => true, 'content' => '<h4>Field Trip Information</h4><p>Please return permission slips by Friday.</p>'],
                ['title' => 'December Highlights', 'category' => 'Monthly', 'date' => 'Dec 20, 2025', 'excerpt' => 'What a wonderful December we had! See photos and highlights from our festive celebrations...', 'is_new' => false, 'content' => '<h4>December Fun!</h4><p>Thank you for joining our end of year concert.</p>'],
            ],
        ]);
    }

    public function gallery()
    {
        return view('parent.gallery', [
            'children' => MockData::enrolledChildren(),
            'albums' => [
                ['title' => 'Ocean Art Activity', 'date' => 'Today', 'photo_count' => 12, 'photos' => [
                    ['src' => 'assets/img/testimonial/testi-1-1.jpg', 'caption' => 'Emma painting'],
                    ['src' => 'assets/img/testimonial/testi-1-2.jpg', 'caption' => 'Artwork display'],
                    ['src' => 'assets/img/testimonial/testi-1-3.jpg', 'caption' => 'Group activity'],
                    ['src' => 'assets/img/testimonial/testi-1-1.jpg', 'caption' => 'Creative time'],
                    ['src' => 'assets/img/testimonial/testi-1-2.jpg', 'caption' => 'Finished art'],
                    ['src' => 'assets/img/testimonial/testi-1-3.jpg', 'caption' => 'Class fun'],
                ]],
                ['title' => 'Outdoor Play', 'date' => 'Yesterday', 'photo_count' => 8, 'photos' => [
                    ['src' => 'assets/img/testimonial/testi-1-2.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-3.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-1.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-2.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-3.jpg'],
                    ['src' => 'assets/img/testimonial/testi-1-1.jpg'],
                ]],
            ],
        ]);
    }

    public function fees()
    {
        return view('parent.fees', [
            'children' => MockData::enrolledChildren(),
            'payments' => MockData::payments(),
        ]);
    }

    public function statements()
    {
        return view('parent.statements', [
            'children' => MockData::enrolledChildren(),
            'accountSummary' => [
                'monthly_fee' => 4200,
                'last_payment' => 4600,
                'last_payment_date' => 'Jan 5, 2026',
                'balance' => 0,
                'next_due' => '1 Feb 2026',
            ],
            'paymentHistory' => [],
        ]);
    }

    public function uploadPop()
    {
        return redirect()->route('parent.fees')->with('success', 'Proof of payment uploaded successfully');
    }

    public function messages()
    {
        return view('parent.messages');
    }

    public function sendMessage()
    {
        return redirect()->route('parent.messages')->with('success', 'Message sent');
    }

    public function holidayCare()
    {
        return view('parent.holiday-care', [
            'children' => MockData::enrolledChildren(),
        ]);
    }

    public function bookHolidayCare()
    {
        return redirect()->route('parent.holiday-care')->with('success', 'Holiday care booked successfully');
    }

    public function extraMurals()
    {
        return view('parent.extra-murals', [
            'children' => MockData::enrolledChildren(),
            'services' => MockData::services(),
        ]);
    }

    public function signupExtraMurals()
    {
        return redirect()->route('parent.extra-murals')->with('success', 'Signed up successfully');
    }

    public function snackBox()
    {
        return view('parent.snack-box', [
            'children' => MockData::enrolledChildren(),
        ]);
    }

    public function signupSnackBox()
    {
        return redirect()->route('parent.snack-box')->with('success', 'Snack box subscription updated');
    }

    public function profile()
    {
        return view('parent.profile', [
            'parent' => $this->getCurrentParent(),
        ]);
    }

    public function updateProfile()
    {
        return redirect()->route('parent.profile')->with('success', 'Profile updated successfully');
    }
}
