@if(session()->has('success'))
    <div class="alert">{{session()->get('success')}}</div>
@endif
<h1>{{ $article->title }}</h1>
<p>{{ $article->description }}</p>
<img src="{{ $article->image }}">{{ $article->title }}</img>
<a href="{{ route('articles.index') }}">Back</a>
