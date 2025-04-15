<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
class TestimonialController extends Controller
{
    public function index() {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create() {
        return view('admin.testimonials.create');
    }

    public function store(Request $request) {
        $testimonial = Testimonial::create($request->only(['photo', 'name', 'contenu']));
        return redirect()->route('testimonials.index');
    }

    public function edit(Testimonial $testimonial) {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial) {
        $testimonial->update($request->only(['photo', 'name', 'contenu']));
        return redirect()->route('testimonials.index');
    }

    public function destroy(Testimonial $testimonial) {
        $testimonial->delete();
        return redirect()->route('testimonials.index');
    }
}
