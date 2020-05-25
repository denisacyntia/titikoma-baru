@extends('layouts.user')

@section('content')

    <section id="articles" class="articles">
        <div class="container">
            <div class="section-title" >
                <h2>Artikel</h2>
            </div>
            <div class="row">
                <div class="col-lg-8 entries">
                    @forelse($articles as $row)
                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="{{ asset('storage/article/' . $row->image) }}" alt="" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a id="title" href="{{url('/article')}}"> {{$row->name}}{{--Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia reiciendis--}}</a>
                        </h2>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">TITIKOMA Official</a></li>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html">{{--<time datetime="2020-01-01">Jan 1, 2020</time>--}}
                                    {{$row->updated_at}}</a></li>
                                {{--<li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>--}}
                            </ul>
                        </div>
                        <div class="entry-content">
                            <p id="content">
                                {!!substr($row->description,0,400)!!}
                            </p>
                            <div class="read-more">
                                <a  href="{{--{{url('/article'.$result->['artikel_id'])}}--}}">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </article>
                    @empty
                    @endforelse
                    {{--<div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li class="disabled"><i class="icofont-rounded-left"></i></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                        </ul>
                    </div>--}}
                    {{$articles->links()}}
                </div>{{--End Col--}}
                <div class="col-lg-4">
                    <div class="sidebar" >
                        <h3 class="sidebar-title">Cari Artikel</h3>
                        @if(count($articles))
                            <div class="sidebar-item search-form">
                                <form action="{{url('/article')}}" method="GET">
                                    <input type="text" name="cari" value="{{old('cari')}}">
                                    <button type="submit"><i class="icofont-search"></i></button>
                                </form>
                            </div><!-- End sidebar search form-->
                            <div class="sidebar-item recent-posts">
                                @foreach($articles as $row)
                                    <div class="post-item clearfix">
                                        <img src="{{ asset('storage/article/' . $row->image) }}" alt="">
                                        <h4><a href="blog-single.html">{{$row->name}}</a></h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                @endforeach
                            </div>
                            @else
                                <div>Oops.. Data <b>{{$cari}}</b> Tidak ditemukan</div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

