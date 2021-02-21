<?php $cours='formation'; 
?>
@extends('layouts.app')

@section('content')
<section class="mt-4 mb-4 blog_details_area p_100">
            <div class="container">
                <div class="row blog_details_inner">
                    <div class="col-md-8">
                        <div class="blog_details_img">
                            <img src="{{asset('storage') . '/' . $formations->image}}" alt="">
                        </div>
                        <div class="blog_d_text">
                            <!-- <h6>Posted by <a href="#">Admin</a></h6> -->
                            <h3>{{ __('formationDetail.detail') }} {{$formations->titre}}</h3>
                            <p>
                                {{$formations->description}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar_area">
                            <aside class="right_widget r_post_widget">
                                <div align="center" class="mt-4 sidebar-box">
                                    <img src="{{asset('image') . '/' . 'baptiste.jpg'}}" alt="Free Website Template by Free-Template.co" class="img-fluid mb-4 w-50 rounded-circle">
                                    <h3 class="text-black">{{ __('formationDetail.propos') }}</h3>
                                        <p align="left">
                                        {{ __('formationDetail.formateur') }} 
                                        </p>
                                </div>
                            </aside>
                            <aside class="mt-2 right_widget r_social_widget">
                                <div class="r_w_title">
                                    <h3>{{ __('formationDetail.suivre') }}</h3>
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