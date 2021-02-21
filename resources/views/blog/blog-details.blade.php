<?php $cours='blog'; 
?>
@extends('layouts.app')

@section('content')
<section class="mt-4 mb-4 blog_details_area p_100">
            <div class="container">
                <div class="row blog_details_inner">
                    <div class="col-md-8">
                        <div class="blog_details_img">
                            <img src="{{asset('storage') . '/' . $articles->image}}" alt="">
                            <div class="b_date">
                                <h3>{{$articles->created_at->formatLocalized('%d')}}</h3>
                                <h5>{{$articles->created_at->formatLocalized('%B')}}, {{$articles->created_at->formatLocalized('%Y')}}</h5>
                            </div>
                        </div>
                        <div class="blog_d_text">
                            <h6>Posted by <strong class="text-primary">{{$articles->auteur}}</strong></h6>
                            <h3>{{$articles->titre}}</h3>
                            <p>{{$articles->contenu}}</p>
                        </div>
                        <div class="container p-2">
                            <div class="row">
                                <p class="m-3">
                                    <span class="font-weight-bold">{{$articles->comments->count()}} commentaires</span>
                                </p>
                                <div class="col-lg-12">
                                    @comments(['model' => $articles])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar_area">
                            <aside class="right_widget r_post_widget">
                                <div align="center" class="mt-4 sidebar-box">
                                    <img src="{{asset('image') . '/' . 'gaston.png'}}" alt="" class="img-fluid mb-4 w-50 rounded-circle">
                                    <h3 class="text-black">A Propos de l'auteur</h3>
                                    <p align="left">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    </p>
                                    </div>
                                </div>
                            </aside>
                            <aside class="mt-2 right_widget r_social_widget">
                                <div class="r_w_title">
                                    <h3>Suivez nous sur</h3>
                                </div>
                                <ul> 
                                    <li>
                                        <a href="https://m.facebook.com/pages/category/Business-Service/ECNA-cameroun-101786388026829/" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="https://twitter.com/EcnaCameroun?s=09" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li>
                                        <a href="https://www.youtube.com/channel/UCBv3ppcXWmy2CNyjIO9dang" target="_blank" ><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://wa.me237691525086" target="_blank" > <i class="fa fa-whatsapp" aria-hidden="true"></i> </a>
                                    </li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection