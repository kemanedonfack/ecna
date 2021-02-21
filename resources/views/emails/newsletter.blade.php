@component('mail::message')

un nouvel article est disponible sur Ecna Cameroun

<div class="col-lg-4 col-md-6 mb-4 animated wow fadeInUp" data-wow-delay="0.5s">
    <div class="post-entry-1 h-100 ">
        <a href="{{route('article.show',['articles' => $last->id])}}">
            <img src="{{asset('storage') . '/' . $last->image}}" alt="Image"class="img-fluid">
        </a>
        <div class="post-entry-1-contents">             
            <h2><a href="{{route('article.show',['article' => $last->id])}}">{{$last->titre}}</a></h2>
            <span class="meta d-inline-block mb-3">{{Carbon\Carbon::parse($last->created_at)->formatLocalized('%d %B %Y') }}<span class="mx-2">by</span> 
            <span class="text-primary">{{$last->auteur}}</span></span>
            <p>{{$last->contenu}}.</p>  
        </div>
    </div>
</div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

