<!DOCTYPE html>
<html lang="zxx">


<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="{{asset('assets_site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/modal-video.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/fonts/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/nice-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/theme-dark.css')}}">

    <title>Findo - Fundraising & Charity HTML Template</title>
    <link rel="icon" type="image/png" href="assets_site/img/favicon.png">
</head>

<body>

    <div class="loader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="pre-box-one">
                    <div class="pre-box-two"></div>
                </div>
            </div>
        </div>
    </div>


    <!--div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left">
                        <ul>
                            <li>
                                <i class="icofont-location-pin"></i>
                                <a href="#">6B, Helvetica street, Jordan</a>
                            </li>
                            <li>
                                <i class="icofont-ui-call"></i>
                                <a href="tel:0123456987">+0123-456-987</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="right">
                        <ul>
                            <li>
                                <span>Follow Us:</span>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="icofont-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.twitter.com/" target="_blank">
                                    <i class="icofont-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/" target="_blank">
                                    <i class="icofont-youtube-play"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class="icofont-instagram"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="language">
                            <select>
                                <option>English</option>
                                <option>العربيّة</option>
                                <option>Deutsch</option>
                                <option>Português</option>
                            </select>
                        </div>
                        <div class="header-search">
                            <i id="search-btn" class="icofont-search-2"></i>
                            <div id="search-overlay" class="block">
                                <div class="centered">
                                    <div id="search-box">
                                        <i id="close-btn" class="icofont-close"></i>
                                        <form>
                                            <input type="text" class="form-control" placeholder="Search..." />
                                            <button type="submit" class="btn">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div-->


    <div class="navbar-area sticky-top">

        <div class="mobile-nav">
            <a href="{{route('welcome')}}" class="logo">
                <img src="assets_site/img/logo-two.png" alt="Logo">
            </a>
        </div>

        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{route('welcome')}}">
                        <img src="assets_site/img/logo.png" class="logo-one" alt="Logo">
                        <img src="assets_site/img/logo-two.png" class="logo-two" alt="Logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{route('welcome')}}" class="nav-link">Acceuil</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Notre Equipe</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Témoignages</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Contact</a>
                            </li>
                        </ul>
                        <div class="side-nav">
                            <a class="donate-btn" href="{{route('user_dashboard')}}">
                                Mon espace
                                <i class="icofont-heart-alt"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>


    <div class="banner-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="banner-content">
                                <span>Let’s contribute to make world a better place</span>
                                <h1>Fundraising for helpless and causes you care about</h1>
                                <p>It is a long established fact that a reader will be page distracted by the readable
                                    content of a pain</p>
                                <div class="banner-btn-area">
                                    <a class="common-btn banner-btn" href="#">Get Start A Fundraising</a>
                                    <a class="common-btn" href="#">Donate Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner-img">
                                <img src="assets_site/img/banner/banner-main1.jpg" alt="Banner">
                                <img src="assets_site/img/banner/banner-main2.png" alt="Banner">
                                <div class="video-wrap">
                                    <button class="js-modal-btn" data-video-id="uemObN8_dcw">
                                        <i class="icofont-ui-play"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="dream-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Fulfill our dream</span>
                <h2>Mission to make a smile</h2>
                <p>We exist for non-profits, social enterprises, community groups, activists,lorem politicians and
                    individual citizens that are making.</p>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="dream-item">
                        <h3>
                            <a href="donations.html">Over 20M+ people around the world is having good life because of
                                Findo</a>
                        </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots.</p>
                        <h4><span>*50</span>country served world wide</h4>
                        <span class="sub-span">01</span>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dream-item">
                        <h3>
                            <a href="donations.html">We are supporting the poor and homeless people by providing
                                food</a>
                        </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots.</p>
                        <h4><span>*Food</span>served world wide</h4>
                        <span class="sub-span">02</span>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dream-item">
                        <h3>
                            <a href="donations.html">First time a non- profitable organization is fighting against the
                                poverty</a>
                        </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots.</p>
                        <h4><span>*Finance</span>collecting & donating</h4>
                        <span class="sub-span">03</span>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dream-item">
                        <h3>
                            <a href="donations.html">Over 1200+ volunteer working for Findo around the world</a>
                        </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots.</p>
                        <h4><span>*Volunteer</span>in every Country</h4>
                        <span class="sub-span">04</span>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dream-item">
                        <h3>
                            <a href="donations.html">Hands move to support in Yemen combat covid-19 by donating face
                                masks</a>
                        </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots.</p>
                        <h4><span>*Lockdown</span>covid-19 helping</h4>
                        <span class="sub-span">05</span>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dream-item">
                        <h3>
                            <a href="donations.html">This project seeks to build houses for reduce their suffering allow
                                them to live</a>
                        </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots.</p>
                        <h4><span>*150</span>house project</h4>
                        <span class="sub-span">06</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="assets_site/img/about/about-main1.jpg" alt="About">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title">
                            <span class="sub-title">About us</span>
                            <h2>We're for social causes</h2>
                        </div>
                        <span class="about-span">We exist for non-profits, social enterprises, community groups,
                            activists,lorem politicians and individual citizens that are making.</span>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore minima atque obcaecati
                            deleniti tempora, cumque molestiae consectetur provident temporibus natus iste accusamus
                            totam voluptas quas suscipit blanditiis fuga quibusdam porro.</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout.</p>
                        <div class="about-btn-area">
                            <a class="common-btn about-btn" href="#">Get Start A Fundraising</a>
                            <a class="common-btn" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="feature-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-item">
                        <i class="flaticon-solidarity"></i>
                        <h3>
                            <a href="#">Be a volunteer</a>
                        </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply rom text. Contrary to popular belief is
                            not simply.</p>
                        <a class="feature-btn" href="#">Join Now</a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-item two">
                        <i class="flaticon-donation"></i>
                        <h3>
                            <a href="#">Donate now</a>
                        </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply rom text. Contrary to popular belief is
                            not simply.</p>
                        <a class="feature-btn" href="#">Join Now</a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-item three">
                        <i class="flaticon-love"></i>
                        <h3>
                            <a href="#">Show your love</a>
                        </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply rom text. Contrary to popular belief is
                            not simply.</p>
                        <a class="feature-btn" href="#">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="donations-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Causes to care</span>
                <h2>Be the reason of someone smiles</h2>
                <p>We exist for non-profits, social enterprises, community groups, activists,lorem politicians and
                    individual citizens that are making.</p>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="donation-item">
                        <div class="img">
                            <img src="assets_site/img/donation/donation1.jpg" alt="Donation">
                            <a class="common-btn" href="donation-details.html">Donate Now</a>
                        </div>
                        <div class="inner">
                            <div class="top">
                                <a class="tags" href="#">#Medical</a>
                                <h3>
                                    <a href="donation-details.html">Need help for treatment</a>
                                </h3>
                                <p>We exist for non-profits, social enterprises, activists. Lorem politicians and
                                    individual citizens.</p>
                            </div>
                            <div class="bottom">
                                <div class="skill">
                                    <div class="skill-bar skill1 wow fadeInLeftBig">
                                        <span class="skill-count1">85%</span>
                                    </div>
                                </div>
                                <ul>
                                    <li>Raised: $5,500.00</li>
                                    <li>Goal: $7,000.00</li>
                                </ul>
                                <h4>Donated by <span>60 people</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="donation-item">
                        <div class="img">
                            <img src="assets_site/img/donation/donation2.jpg" alt="Donation">
                            <a class="common-btn" href="donation-details.html">Donate Now</a>
                        </div>
                        <div class="inner">
                            <div class="top">
                                <a class="tags" href="#">#Education</a>
                                <h3>
                                    <a href="donation-details.html">Education for poor children</a>
                                </h3>
                                <p>We exist for non-profits, social enterprises, activists. Lorem politicians and
                                    individual citizens.</p>
                            </div>
                            <div class="bottom">
                                <div class="skill">
                                    <div class="skill-bar skill2 wow fadeInLeftBig">
                                        <span class="skill-count2">95%</span>
                                    </div>
                                </div>
                                <ul>
                                    <li>Raised: $6,500.00</li>
                                    <li>Goal: $8,050.00</li>
                                </ul>
                                <h4>Donated by <span>50 people</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="donation-item">
                        <div class="img">
                            <img src="assets_site/img/donation/donation3.jpg" alt="Donation">
                            <a class="common-btn" href="donation-details.html">Donate Now</a>
                        </div>
                        <div class="inner">
                            <div class="top">
                                <a class="tags" href="#">#Family</a>
                                <h3>
                                    <a href="donation-details.html">Financial help for poor</a>
                                </h3>
                                <p>We exist for non-profits, social enterprises, activists. Lorem politicians and
                                    individual citizens.</p>
                            </div>
                            <div class="bottom">
                                <div class="skill">
                                    <div class="skill-bar skill3 wow fadeInLeftBig">
                                        <span class="skill-count3">90%</span>
                                    </div>
                                </div>
                                <ul>
                                    <li>Raised: $5,540.00</li>
                                    <li>Goal: $6,055.00</li>
                                </ul>
                                <h4>Donated by <span>40 people</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="donation-item">
                        <div class="img">
                            <img src="assets_site/img/donation/donation4.jpg" alt="Donation">
                            <a class="common-btn" href="donation-details.html">Donate Now</a>
                        </div>
                        <div class="inner">
                            <div class="top">
                                <a class="tags" href="#">#Funding</a>
                                <h3>
                                    <a href="donation-details.html">Funding for family</a>
                                </h3>
                                <p>We exist for non-profits, social enterprises, activists. Lorem politicians and
                                    individual citizens.</p>
                            </div>
                            <div class="bottom">
                                <div class="skill">
                                    <div class="skill-bar skill4 wow fadeInLeftBig">
                                        <span class="skill-count4">80%</span>
                                    </div>
                                </div>
                                <ul>
                                    <li>Raised: $5,56.00</li>
                                    <li>Goal: $6,85.00</li>
                                </ul>
                                <h4>Donated by <span>30 people</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="donation-item">
                        <div class="img">
                            <img src="assets_site/img/donation/donation5.jpg" alt="Donation">
                            <a class="common-btn" href="donation-details.html">Donate Now</a>
                        </div>
                        <div class="inner">
                            <div class="top">
                                <a class="tags" href="#">#Relief</a>
                                <h3>
                                    <a href="donation-details.html">Relief for cyclone-affected</a>
                                </h3>
                                <p>We exist for non-profits, social enterprises, activists. Lorem politicians and
                                    individual citizens.</p>
                            </div>
                            <div class="bottom">
                                <div class="skill">
                                    <div class="skill-bar skill5 wow fadeInLeftBig">
                                        <span class="skill-count5">75%</span>
                                    </div>
                                </div>
                                <ul>
                                    <li>Raised: $5,5.00</li>
                                    <li>Goal: $3,85.00</li>
                                </ul>
                                <h4>Donated by <span>20 people</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="donation-item">
                        <div class="img">
                            <img src="assets_site/img/donation/donation6.jpg" alt="Donation">
                            <a class="common-btn" href="donation-details.html">Donate Now</a>
                        </div>
                        <div class="inner">
                            <div class="top">
                                <a class="tags" href="#">#Drought</a>
                                <h3>
                                    <a href="donation-details.html">Relief for drought-affected</a>
                                </h3>
                                <p>We exist for non-profits, social enterprises, activists. Lorem politicians and
                                    individual citizens.</p>
                            </div>
                            <div class="bottom">
                                <div class="skill">
                                    <div class="skill-bar skill6 wow fadeInLeftBig">
                                        <span class="skill-count6">70%</span>
                                    </div>
                                </div>
                                <ul>
                                    <li>Raised: $9,5.00</li>
                                    <li>Goal: $3,84.00</li>
                                </ul>
                                <h4>Donated by <span>10 people</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="work-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="work-content">
                        <div class="section-title">
                            <span class="sub-title">How we work</span>
                            <h2>We exist for non-profits, social enterprises, community groups</h2>
                        </div>
                        <ul>
                            <li>
                                <h3><span>01</span>Raise money from different sources</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, pariatur esse
                                    animi temporibus iusto at dolorum</p>
                            </li>
                            <li>
                                <h3><span>02</span>Giving relief in rural area all over the world</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, pariatur esse
                                    animi temporibus iusto at dolorum</p>
                            </li>
                            <li>
                                <h3><span>03</span>Gather all the money and giving relief in need</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, pariatur esse
                                    animi temporibus iusto at dolorum</p>
                            </li>
                            <li>
                                <h3><span>04</span>Go to the country that really needs help</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, pariatur esse
                                    animi temporibus iusto at dolorum</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="work-img">
                        <img src="assets_site/img/work/work1.jpg" alt="Work">
                        <img src="assets_site/img/work/work2.jpg" alt="Work">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="benefit-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item">
                        <i class="flaticon-house"></i>
                        <h3>Build home</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam
                            magnam earum</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item two">
                        <i class="flaticon-hospital"></i>
                        <h3>Medical facilities</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam
                            magnam earum</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item three">
                        <i class="flaticon-fast-food"></i>
                        <h3>Food & water</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam
                            magnam earum</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item four">
                        <i class="flaticon-graduation-cap"></i>
                        <h3>Education facilities</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam
                            magnam earum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="event-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Our events</span>
                <h2>Upcoming events near you</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="event-item">
                        <img src="assets_site/img/event/event1.jpg" alt="Event">
                        <div class="inner">
                            <h4>04 <span>Jan</span></h4>
                            <h3>
                                <a href="event-details.html">Fundraising for MQ</a>
                            </h3>
                            <ul>
                                <li>
                                    <i class="icofont-stopwatch"></i>
                                    <span>2.00pm - 5.00pm</span>
                                </li>
                                <li>
                                    <i class="icofont-location-pin"></i>
                                    <span>Australia</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="event-item">
                        <img src="assets_site/img/event/event2.jpg" alt="Event">
                        <div class="inner">
                            <h4>05 <span>Jan</span></h4>
                            <h3>
                                <a href="event-details.html">Shout about it with us</a>
                            </h3>
                            <ul>
                                <li>
                                    <i class="icofont-stopwatch"></i>
                                    <span>1.00pm - 2.00pm</span>
                                </li>
                                <li>
                                    <i class="icofont-location-pin"></i>
                                    <span>Canada</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="event-item">
                        <img src="assets_site/img/event/event3.jpg" alt="Event">
                        <div class="inner">
                            <h4>10 <span>Jan</span></h4>
                            <h3>
                                <a href="event-details.html">Relief giving - Providing relief</a>
                            </h3>
                            <ul>
                                <li>
                                    <i class="icofont-stopwatch"></i>
                                    <span>3.00pm - 4.00pm</span>
                                </li>
                                <li>
                                    <i class="icofont-location-pin"></i>
                                    <span>USA</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="event-item-right">
                        <h4>06 <span>Jan</span></h4>
                        <h3>
                            <a href="event-details.html">Challenge is right for you</a>
                        </h3>
                        <ul>
                            <li>
                                <i class="icofont-stopwatch"></i>
                                <span>10.00am - 11.00am</span>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                <span>UK</span>
                            </li>
                        </ul>
                    </div>
                    <div class="event-item-right">
                        <h4>07 <span>Jan</span></h4>
                        <h3>
                            <a href="event-details.html">Fundraising is going</a>
                        </h3>
                        <ul>
                            <li>
                                <i class="icofont-stopwatch"></i>
                                <span>11.00am - 12.00pm</span>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                <span>France</span>
                            </li>
                        </ul>
                    </div>
                    <div class="event-item-right">
                        <h4>08 <span>Jan</span></h4>
                        <h3>
                            <a href="event-details.html">Bowling for a cause</a>
                        </h3>
                        <ul>
                            <li>
                                <i class="icofont-stopwatch"></i>
                                <span>1.00pm - 1.30pm</span>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                <span>Spain</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="gallery-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Our gallery</span>
                <h2>Discover the best things we do</h2>
                <p>We exist for non-profits, social enterprises, community groups, activists,lorem politicians and
                    individual citizens that are making.</p>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="gallery-item">
                        <a href="assets_site/img/gallery/gallery1.jpg" data-lightbox="roadtrip">
                            <img src="assets_site/img/gallery/gallery1.jpg" alt="Gallery">
                            <i class="icofont-eye"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="gallery-item">
                        <a href="assets_site/img/gallery/gallery2.jpg" data-lightbox="roadtrip">
                            <img src="assets_site/img/gallery/gallery2.jpg" alt="Gallery">
                            <i class="icofont-eye"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="gallery-item">
                        <a href="assets_site/img/gallery/gallery3.jpg" data-lightbox="roadtrip">
                            <img src="assets_site/img/gallery/gallery3.jpg" alt="Gallery">
                            <i class="icofont-eye"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="gallery-item">
                        <a href="assets_site/img/gallery/gallery4.jpg" data-lightbox="roadtrip">
                            <img src="assets_site/img/gallery/gallery4.jpg" alt="Gallery">
                            <i class="icofont-eye"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="gallery-item">
                        <a href="assets_site/img/gallery/gallery5.jpg" data-lightbox="roadtrip">
                            <img src="assets_site/img/gallery/gallery5.jpg" alt="Gallery">
                            <i class="icofont-eye"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="gallery-item">
                        <a href="assets_site/img/gallery/gallery6.jpg" data-lightbox="roadtrip">
                            <img src="assets_site/img/gallery/gallery6.jpg" alt="Gallery">
                            <i class="icofont-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Latest news & blog</span>
                <h2>Latest charity blog</h2>
                <p>We exist for non-profits, social enterprises, community groups, activists,lorem politicians and
                    individual citizens that are making.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item">
                        <div class="top">
                            <a href="blog-details.html">
                                <img src="assets_site/img/blog/blog1.jpg" alt="Blog">
                            </a>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    <span>21 Jan, 2024</span>
                                </li>
                                <li>
                                    <i class="icofont-user-alt-3"></i>
                                    <span>By:</span>
                                    <a href="#">Admin</a>
                                </li>
                            </ul>
                            <h3>
                                <a href="blog-details.html">Donate for nutration less poor people</a>
                            </h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet cupiditate sit ducimus
                                dolor laudantium distinction</p>
                            <a class="blog-btn" href="blog-details.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item">
                        <div class="top">
                            <a href="blog-details.html">
                                <img src="assets_site/img/blog/blog2.jpg" alt="Blog">
                            </a>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    <span>22 Jan, 2024</span>
                                </li>
                                <li>
                                    <i class="icofont-user-alt-3"></i>
                                    <span>By:</span>
                                    <a href="#">Admin</a>
                                </li>
                            </ul>
                            <h3>
                                <a href="blog-details.html">Charity meetup in Berline next year</a>
                            </h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet cupiditate sit ducimus
                                dolor laudantium distinction</p>
                            <a class="blog-btn" href="blog-details.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item">
                        <div class="top">
                            <a href="blog-details.html">
                                <img src="assets_site/img/blog/blog3.jpg" alt="Blog">
                            </a>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    <span>23 Jan, 2024</span>
                                </li>
                                <li>
                                    <i class="icofont-user-alt-3"></i>
                                    <span>By:</span>
                                    <a href="#">Admin</a>
                                </li>
                            </ul>
                            <h3>
                                <a href="blog-details.html">Donate for the poor people to help them</a>
                            </h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet cupiditate sit ducimus
                                dolor laudantium distinction</p>
                            <a class="blog-btn" href="blog-details.html">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-logo">
                            <a class="logo" href="{{route('welcome')}}">
                                <img src="assets_site/img/logo-two.png" alt="Logo">
                            </a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat vero, magni est placeat
                                neque, repellat maxime a dolore</p>
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="icofont-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/" target="_blank">
                                        <i class="icofont-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/" target="_blank">
                                        <i class="icofont-youtube-play"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="icofont-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-causes">
                            <h3>Urgent causes</h3>
                            <div class="cause-inner">
                                <ul class="align-items-center">
                                    <li>
                                        <img src="assets_site/img/footer-thumb1.jpg" alt="Cause">
                                    </li>
                                    <li>
                                        <h3>
                                            <a href="donation-details.html">Donate for melina the little child</a>
                                        </h3>
                                    </li>
                                </ul>
                            </div>
                            <div class="cause-inner">
                                <ul class="align-items-center">
                                    <li>
                                        <img src="assets_site/img/footer-thumb2.jpg" alt="Cause">
                                    </li>
                                    <li>
                                        <h3>
                                            <a href="donation-details.html">Relief for Australia cyclone effected</a>
                                        </h3>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-links">
                            <h3>Quick links</h3>
                            <ul>
                                <li>
                                    <a href="about.html">
                                        <i class="icofont-simple-right"></i>
                                        About
                                    </a>
                                </li>
                                <li>
                                    <a href="blog.html">
                                        <i class="icofont-simple-right"></i>
                                        Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="events.html">
                                        <i class="icofont-simple-right"></i>
                                        Events
                                    </a>
                                </li>
                                <li>
                                    <a href="donation.html">
                                        <i class="icofont-simple-right"></i>
                                        Donation
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-contact">
                            <h3>Contact info</h3>
                            <div class="contact-inner">
                                <ul>
                                    <li>
                                        <i class="icofont-location-pin"></i>
                                        <a href="#">6B, Helvetica street, Jordan</a>
                                    </li>
                                    <li>
                                        <i class="icofont-ui-call"></i>
                                        <a href="tel:123456789">+123-456-789</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="contact-inner">
                                <ul>
                                    <li>
                                        <i class="icofont-location-pin"></i>
                                        <a href="#">6A, New street, Spain</a>
                                    </li>
                                    <li>
                                        <i class="icofont-ui-call"></i>
                                        <a href="tel:548658956">+548-658-956</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <p>Copyright @<script>
                        document.write(new Date().getFullYear())

                    </script> Findo. Designed By <a href="https://hibootstrap.com/" target="_blank">HiBootstrap</a></p>
            </div>
        </div>
    </footer>


    <div class="go-top">
        <i class="icofont-arrow-up"></i>
        <i class="icofont-arrow-up"></i>
    </div>


    <script src="{{asset('assets_site/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets_site/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets_site/js/form-validator.min.js')}}"></script>
    <script src="{{asset('assets_site/js/contact-form-script.js')}}"></script>
    <script src="assets_site/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets_site/js/jquery.meanmenu.js')}}"></script>
    <script src="{{asset('assets_site/js/jquery-modal-video.min.js')}}"></script>
    <script src="{{asset('assets_site/js/wow.min.js')}}"></script>
    <script src="{{asset('assets_site/js/lightbox.min.js')}}"></script>
    <script src="{{asset('assets_site/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets_site/js/odometer.min.js')}}"></script>
    <script src="{{asset('assets_site/js/jquery.appear.min.js')}}"></script>
    <script src="{{asset('assets_site/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets_site/js/custom.js')}}"></script>

</body>

</html>