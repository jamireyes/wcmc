@include('layouts.include.navbar')
@extends('layouts.app')

@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/doctor.jpg') }}">
            <div class="container">
                <div class="carousel-caption">
                    <h2 class="text-primary font-abril">White Cross Medical Clinic</h2>
                    <p>Medical Clinic and Clinical Laboratory in Cebu City<br>Opening at 9:00 AM on Monday</p>
                    <a class="btn btn-lg btn-primary js-scroll-trigger" href="#Contact" >Contact Us</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/image_1.jpg') }}">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/image_2.jpg') }}">
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container">
    {{-- <section id="">
        <div class="marketing">
            <div class="row px-5">
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                    <h2>Heading</h2>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                    <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                    <h2>Heading</h2>
                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                    <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                    <h2>Heading</h2>
                    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum.</p>
                    <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
                </div>
            </div>
        </div>
    </section> --}}
        {{-- <hr class="featurette-divider"> --}}
    <section id="About">
        <div class="text-center mt-5 mb-4">
            <i class="fas fa-users fa-3x"></i>
            <h3 class="pt-1">About Us</h3>
        </div>
        <div class="row">
            <div class="container">
                <p><strong class="text-primary font-abril">White Cross Medical Clinic</strong> is a medical clinic and clinical laboratory, duly registered and licensed by the Department of Health, that consistently upholds its mission of rendering quality services to its patients. Established in 2016, WCMC is managed by a medically-inclined family whose priority is excellence at affordable prices. Additionally, we are continuously developing our capacity to reach out a broader scope of clients through providing multiple clinical services and instituting a major facility – that is, the White Cross Medical Clinic Drug Testing Center. Since we started, we have been true to our guiding principle of promoting health among our local clients by means of initiating health-giving community outreach programs.</p>
                <br>
                <h4>Our Vision</h4>
                <p>We envision the White Cross Medical Clinic to be one of the fast-growing medical and laboratory centers in the City of Cebu, committed to provide quality clinical services through our ever proficient and passionate medical team and by means of utilizing state-of-the-art clinical facilities in order to ensure optimal health among local clients which aids them to become effective and efficient individuals in the society.</p>
                <br>
                <h4>Our Mission</h4>
                <p>We are committed to:  
                    <br>&nbsp&nbsp&nbsp&nbsp<i class="fas fa-dot-circle fa-xs"></i>&nbsp&nbsp&nbsp&nbspProfoundly excel in specialized medical practice supported by the ethical and competent medical staff.
                    <br>&nbsp&nbsp&nbsp&nbsp<i class="fas fa-dot-circle fa-xs"></i>&nbsp&nbsp&nbsp&nbspTirelessly provide efficient access to affordable medical care among local clients.
                    <br>&nbsp&nbsp&nbsp&nbsp<i class="fas fa-dot-circle fa-xs"></i>&nbsp&nbsp&nbsp&nbspActively become an instrument of nurtured physical health through quality services and facilities.
                    <br>&nbsp&nbsp&nbsp&nbsp<i class="fas fa-dot-circle fa-xs"></i>&nbsp&nbsp&nbsp&nbspPersistently ensure that White Cross Medical Clinic quality underlies every decision.
                </p>
            </div>
        </div>
    </section>
    <hr class="featurette-divider">
    <section id="Services">
        <div class="text-center mt-5 mb-3">
            <span class="fas fa-briefcase-medical fa-3x"></span>
            <h3 class="pt-1">Medical Services</h3>
        </div>
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title">Medical<br>Check-Up</h4>
                        <p class="card-category text-primary">PHP 250</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title">Medical<br>Certificate</h4>
                        <p class="card-category text-primary">PHP 250</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title">Drug<br>Testing</h4>
                        <p class="card-category text-primary">PHP 300</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title"> Chest<br>X-Ray</h4>
                        <p class="card-category text-primary">PHP 230</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title">Blood<br>Typing</h4>
                        <p class="card-category text-primary">PHP 150</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title">Pregnancy<br>Test</h4>
                        <p class="card-category text-primary">PHP 100</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title">Blood Sugar<br>Test</h4>
                        <p class="card-category text-primary">PHP 80</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title">Hepatitis A<br>Test</h4>
                        <p class="card-category text-primary">PHP 500</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title">Hepatitis B<br>Test</h4>
                        <p class="card-category text-primary">PHP 250</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title">CBC Test<br>&nbsp</h4>
                        <p class="card-category text-primary">PHP 120</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title">Urinalysis<br>&nbsp</h4>
                        <p class="card-category text-primary">PHP 80</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="card-title">Stool Exam<br>&nbsp</h4>
                        <p class="card-category text-primary">PHP 80</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="featurette-divider">
    <section id="Contact">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h4>Contact</h4>
                <a href="tel:+63-32-255-0305" class="btn btn-primary">Call Now</a>
                <p>(032) 255 0305</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h4><i class="fas fa-map-marker-alt text-danger"></i> Address</h4>
                <a href="https://www.google.com/maps/dir//White+Cross+Medical+Clinic/data=!4m8!4m7!1m0!1m5!1m1!1s0x33a99be239d7dd09:0xa9513e6c377f466!2m2!1d123.9013602!2d10.2950368" target="_blank" class="btn btn-primary">Get Directions</a>
                <p>Room 205 Teodora Building, Osmeña Boulevard Corner D. Jakosalem Street
                    <br>Cebu City, 6000 Cebu
                    <br>Philippines
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h4>Business Hours</h4>
                <table>
                    <tbody>
                        <tr>
                            <td>Mon&nbsp&nbsp&nbsp&nbsp</td>
                            <td>9:00 AM – 5:00 PM</td>
                        </tr>
                        <tr>
                            <td>Tue&nbsp&nbsp&nbsp&nbsp</td>
                            <td>9:00 AM – 5:00 PM</td>
                        </tr>
                        <tr>
                            <td>Wed&nbsp&nbsp&nbsp&nbsp</td>
                            <td>9:00 AM – 5:00 PM</td>
                        </tr>
                        <tr>
                            <td>Thu&nbsp&nbsp&nbsp&nbsp</td>
                            <td>9:00 AM – 5:00 PM</td>
                        </tr>
                        <tr>
                            <td>Fri&nbsp&nbsp&nbsp&nbsp</td>
                            <td>9:00 AM – 5:00 PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <hr class="featurette-divider">
</div>
@endsection

@section('script')
<script>
    $( document ).ready(function() {

        $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                    scrollTop: (target.offset().top - 70)
                    }, 1000, "easeInOutExpo");
                    return false;
                }
            }
        });

        $('.js-scroll-trigger').click(function() {
            $('.navbar-collapse').collapse('hide');
        });

        var navbarCollapse = function() {
            if ($("#MainNav").offset().top > 100) {
            $("#MainNav").addClass("navbar-shrink");
            } else {
            $("#MainNav").removeClass("navbar-shrink");
            }
        };

        navbarCollapse();

        $(window).scroll(navbarCollapse);
    });
</script>
@endsection