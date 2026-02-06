@extends('layouts.public')

@section('title', 'Peekaboo Daycare & Preschool - Parklands, Cape Town')
@section('description', 'Safe, trusted childcare for 3 months to Grade R in Parklands, Cape Town. Qualified teachers, CAPS curriculum, Christian values. Book your tour today.')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-wrapper z-index-common overflow-hidden">
        <div class="vs-balls vs-balls--screen" data-balls-bottom="-6px" data-balls-color="#ffffff"></div>
        <div class="breadcrumb-wrapper__bg wow animate__fadeInUp" data-wow-delay="0.15s" data-vs-gsap-parallax-speed="2"
             data-vs-gsap-parallax-zoom>
            <img src="assets/img/bg/breadcrumb-bg-3.jpg" alt="session bg">
        </div>
        <div class="container">
            <div class="breadcrumb-wrapper__content wow animate__fadeInUp" data-wow-delay="0.45s">
                <h1 class="breadcrumb-wrapper__title">Contact Us</h1>
                <div class="breadcrumb-wrapper__menu--wrap">
                    <ul class="breadcrumb-wrapper__menu">
                        <li class="breadcrumb-wrapper__menu--item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-wrapper__menu--item">Contact us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Contact -->
    <section class="space space-extra-bottom overflow-hidden">
        <div class="container">
            <div class="row gx-60">
                <div class="col-lg-5 mb-30">
                    <div class="vs-title title-anime animation-style2 mb-3">
                        <div class="title-anime__wrap">
                            <span class="vs-title__sub">contact us</span>
                            <h2 class="vs-title__main">Get In Touch</h2>
                        </div>
                    </div>
                    <div class="contact-info mb-20 wow animate__fadeInUp" data-wow-delay="0.45s">
                        <span>Address:</span> 139B Humewood Drive, Parklands, 7441, Cape Town
                    </div>
                    <div class="mb-20">
                        <div class="address-info wow animate__fadeInUp" data-wow-delay="0.55s">
                            <div class="address-info__icon">
                                <i class="fa-light fa-phone-volume"></i>
                            </div>
                            <div class="address-info__content">
                                <span>Contact Us:</span>
                                <a href="tel:021 557 4999">021 557 4999</a> /
                                <a href="tel:082 898 9967">082 898 9967</a>
                            </div>
                        </div>
                        <div class="address-info wow animate__fadeInUp" data-wow-delay="0.65s">
                            <div class="address-info__icon">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div class="address-info__content">
                                <span>Email Us:</span>
                                <a class="text-lowercase" href="mailto:peekaboodaycare@telkomsa.net">peekaboodaycare@telkomsa.net</a>
                            </div>
                        </div>
                    </div>
                    <img class="contact-divider" src="assets/img/elements/divider-contact.svg" alt="toddly">
                    <div class="social-style style2">
                        <span class="social-style__label">Follow Us :</span>
                        <a href="https://facebook.com/peekaboodaycare" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/27828989967" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-7 mb-30">
                    @if(session('success'))
                        <div class="alert alert-success mb-3 wow animate__fadeInUp" data-wow-delay="0.85s">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger mb-3 wow animate__fadeInUp" data-wow-delay="0.85s">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger mb-3 wow animate__fadeInUp" data-wow-delay="0.85s">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="form-style2 wow animate__fadeInUp"
                          data-wow-delay="0.95s">
                        @csrf
                        <div class="row gx-20">
                            <!-- First Name -->
                            <div class="col-md-6 form-group">
                                <input class="form-control @error('fname') is-invalid @enderror" type="text" name="fname" id="fname"
                                       placeholder="Your Name *" value="{{ old('fname') }}" required>
                            </div>
                            <!-- Last Name -->
                            <div class="col-md-6 form-group">
                                <input class="form-control @error('lname') is-invalid @enderror" type="text" name="lname" id="lname"
                                       placeholder="Last Name *" value="{{ old('lname') }}" required>
                            </div>
                            <!-- Email Address -->
                            <div class="col-md-6 form-group">
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email"
                                       placeholder="Email Address *" value="{{ old('email') }}" required>
                            </div>
                            <!-- Phone Number -->
                            <div class="col-md-6 form-group">
                                <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" id="phone"
                                       placeholder="Phone *" value="{{ old('phone') }}" required>
                            </div>
                            <!-- Message -->
                            <div class="col-12 form-group">
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message"
                                          placeholder="Type Your Message *" rows="5" required>{{ old('message') }}</textarea>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-12">
                                <button type="submit" class="vs-btn"><span class="vs-btn__border"></span>Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact -->
    <!-- Map -->
    <div>
        <div class="vs-map wow animate__fadeInUp" data-wow-delay="0.25s">
            <!-- Get Map -->
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe class="gmap_iframe" style="width: 100%; height: 447px; border: 0; overflow: hidden;"
                            src="https://maps.google.com/maps?width=600&amp;height=447&amp;hl=en&amp;q=139B%20Humewood%20Drive,%20Parklands,%20Cape%20Town&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                            allowfullscreen>
                    </iframe>
                    <a class="gmap_canvas__credit" href="https://embed-googlemap.com/">embed google map</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Map End -->

@endsection
