@extends('layouts.user')

@section('content')
    <div class="hero" id="hero">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(assets/images/home-820389_1920.jpg);">
                    <div class="container">
                        <div class="carousel-content animated fadeInUp">
                            <h2>Selamat Datang di <span>TITIKOMA</span></h2>
                            <p>TITIKOMA merupakan penyedia aplikasi berbasis website yang
                                diharapkan dapat membantu Anda untuk mendapatkan penanganan
                                perihal permasalahan diri, keluarga, keuangan, pekerjaan, percintaan,
                                ataupun pertemanan melalui layanan konseling dengan Psikolog.</p>
                            <div class="text-center"><a href="/tentang-kami" class="btn-get-started">Baca Selengkapnya</a></div>
                        </div>
                    </div>
                </div>

                {{--   <!-- Slide 2 -->
                   <div class="carousel-item" style="background-image: url(assets/images/1279.jpg);">
                       <div class="container">
                           <div class="carousel-content animated fadeInUp">
                               <h2>Lorem Ipsum Dolor</h2>
                               <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                               <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                           </div>
                       </div>
                   </div>

                   <!-- Slide 3 -->
                   <div class="carousel-item" style="background-image: url(assets/images/people-woman-coffee-desk-4049990.jpg);">
                       <div class="container">
                           <div class="carousel-content animated fadeInUp">
                               <h2>Sequi ea ut et est quaerat</h2>
                               <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                               <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                           </div>
                       </div>
                   </div>--}}

            </div>

            {{--<a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
--}}
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        </div>
    </div>
    <div class="articles" id="articles">
        <div class="container">

            <div class="section-title" {{--data-aos="fade-up"--}}>
                <h4>Artikel</h4>
            </div>

            <div class="row">
                @forelse($articles as $row)
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box"{{-- data-aos="fade-up"--}}>
                        <h4 class="title"><a href="">{{$row->name}}{{--Lorem Ipsum--}}</a></h4>
                        <p class="description">
                            {!!substr($row->description,0,50)!!}.. Read more
                        </p>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
@endsection
