<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Mail;

class DataController extends Controller
{
    public function showGolfCourses(Request $request)
    {
        $search = $request->input('search');
        $viewType = $request->input('view', 'list'); // default = list

        $query = DB::table('golf_courses')
            ->leftJoin('countries', 'golf_courses.country', '=', 'countries.id')
            ->leftJoin('states', 'golf_courses.state', '=', 'states.id')
            ->leftJoin('cities', 'golf_courses.city', '=', 'cities.id')
            ->select(
                'golf_courses.*',
                'countries.name as country_name',
                'states.name as state_name',
                'cities.name as city_name'
            )
            ->orderBy('golf_courses.course_name', 'asc');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('golf_courses.course_name', 'like', "%{$search}%")
                    ->orWhere('golf_courses.zip_code', 'like', "%{$search}%")
                    ->orWhere('golf_courses.contact_person', 'like', "%{$search}%")
                    ->orWhere('states.name', 'like', "%{$search}%")
                    ->orWhere('cities.name', 'like', "%{$search}%");
            });
        }

        $courses = $query->paginate(6)->appends([
            'search' => $search,
            'view' => $viewType,
        ]);

        return view('golf.golf-courses', compact('courses', 'search', 'viewType'));
    }

    public function show($id)
    {
        $course = DB::table('golf_courses')
            ->select(
                'golf_courses.*',
                'countries.name as country_name',
                'states.name as state_name',
                'cities.name as city_name'
            )
            ->leftJoin('countries', 'golf_courses.country', '=', 'countries.id')
            ->leftJoin('states', 'golf_courses.state', '=', 'states.id')
            ->leftJoin('cities', 'golf_courses.city', '=', 'cities.id')
            ->where('golf_courses.id', $id)
            ->first();

        if (!$course) {
            abort(404, 'Course not found');
        }

        return view('golf.golf-details', compact('course'));
    }

    public function showContact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:120',
            'last_name'  => 'required|string|max:120',
            'email'      => 'required|email|max:200',
            'phone'      => 'required|string|max:20',
            'subject'    => 'required|string|max:200',
            'message'    => 'required|string',
        ]);

        $from     = $validated['email'];
        $subject  = $validated['subject'];
        $to       = ['contact@golf4community.com', 'juniord.dj88@gmail.com'];
        $name     = $validated['first_name'] . ' ' . $validated['last_name'];
        $phone    = $validated['phone'];
        $userMsg  = nl2br(e($validated['message'])); // escapes + preserves line breaks

        // Build the HTML body
        $htmlBody = "
    <html>
        <head>
            <title>New Contact Form Submission</title>
        </head>
        <body style='font-family: Arial, sans-serif; color: #333;'>
            <h2>New Message from Golf4Community Contact Form</h2>
            <table cellspacing='6' cellpadding='6' border='0'>
                <tr><td><strong>Name:</strong></td><td>{$name}</td></tr>
                <tr><td><strong>Email:</strong></td><td>{$from}</td></tr>
                <tr><td><strong>Phone:</strong></td><td>{$phone}</td></tr>
                <tr><td valign='top'><strong>Message:</strong></td><td>{$userMsg}</td></tr>
            </table>
        </body>
    </html>";

        // ✅ Correct way for Symfony Mailer-based Laravel
        // Mail::send([], [], function ($message) use ($to, $from, $subject, $htmlBody, $name) {
        //     $message->to($to)
        //         ->from($from, $name)
        //         ->subject($subject)
        //         ->html($htmlBody);
        // });

        return redirect()
            ->route('contact.show')
            ->with('success', 'Thank you for reaching out! Your message has been successfully sent. We’ll get back to you soon.');
    }

    public function showPartners(Request $request)
    {
        $search = $request->input('search');
        $viewType = $request->input('view', 'grid');

        $partners = DB::table('our_parteners')
            ->select(
                'our_parteners.*',
                'countries.name as country_name',
                'states.name as state_name',
                'cities.name as city_name'
            )
            ->leftJoin('countries', 'our_parteners.country', '=', 'countries.id')
            ->leftJoin('states', 'our_parteners.state', '=', 'states.id')
            ->leftJoin('cities', 'our_parteners.city', '=', 'cities.id')
            ->where('our_parteners.profile_visibility', 'yes')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('our_parteners.first_name', 'like', "%{$search}%")
                        ->orWhere('our_parteners.last_name', 'like', "%{$search}%")
                        ->orWhere('our_parteners.zip_code', 'like', "%{$search}%")
                        ->orWhere('states.name', 'like', "%{$search}%")
                        ->orWhere('cities.name', 'like', "%{$search}%")
                        ->orWhere('countries.name', 'like', "%{$search}%")
                        ->orWhere('our_parteners.address', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('our_parteners.id')
            ->paginate(9)
            ->appends(['search' => $search, 'view' => $viewType]);
        return view('partners.index', compact('partners', 'search', 'viewType'));
    }

    public function showPartnersId($id)
    {
        $partner = DB::table('our_parteners')
            ->select(
                'our_parteners.*',
                'countries.name as country_name',
                'states.name as state_name',
                'cities.name as city_name'
            )
            ->leftJoin('countries', 'our_parteners.country', '=', 'countries.id')
            ->leftJoin('states', 'our_parteners.state', '=', 'states.id')
            ->leftJoin('cities', 'our_parteners.city', '=', 'cities.id')
            ->where('our_parteners.id', $id)
            ->where('our_parteners.profile_visibility', 'yes')
            ->first();

        if (! $partner) {
            return redirect()->route('partners.index')->with('error', 'Partner not found.');
        }

        return view('partners.show', compact('partner'));
    }

    public function showEvents()
    {
        $today = now()->toDateString();

        $events = DB::table('events')
            ->whereDate('startdate', '>', $today)
            ->orderBy('startdate', 'asc')
            ->get();

        dd($events);

        return view('events.index', compact('events'));
    }
}
