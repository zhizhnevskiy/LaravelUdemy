@extends('layouts.home_master')

@section('home_content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Contact</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Contact</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
        <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d72876.44493947222!2d30.124854965364904!3d55.19395833668582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46c573e3fc7c7be7%3A0x430637d0624afff4!2sViciebsk!5e0!3m2!1sen!2sby!4v1651066608589!5m2!1sen!2sby"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
    </div>

    <section id="contact" class="contact">
        <div class="container">

            <div class="row justify-content-center" data-aos="fade-up">

                <div class="col-lg-10">

                    <div class="info-wrap">
                        <div class="row">
                            <div class="col-lg-4 info">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p>{{ $contact->address }}</p>
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>{{ $contact->email }}</p>
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p>{{ $contact->phone }}</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row mt-5 justify-content-center" data-aos="fade-up">

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"> {{ session('success') }} </h4>
                    </div>
                @endif

                <div class="col-lg-10">
                    <form  action="{{ route('contact.form') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Your Name"
                                />
                            </div>
                            <div class="col-md-6 form-group">
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    placeholder="Your Email"
                                />
                            </div>
                        </div>
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                name="subject"
                                placeholder="Subject"
                            />
                        </div>
                        <div class="form-group">
                            <textarea
                                class="form-control"
                                name="message"
                                rows="5"
                                placeholder="Message"
                            ></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Send Message</button>
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection
