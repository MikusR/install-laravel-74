@if(session()->has('success'))
    <div class="alert">{{session()->get('success')}}</div>
@endif

<h1>Articles</h1>
@foreach($articles as $article)
    <div>
        <h2>{{ $article->title }}</h2>
        <form action="{{ route('articles.destroy', $article) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <p>{{ $article->short_description }}</p>
        <img src="{{ $article->image }}">{{ $article->title }}</img>
        <a href="{{ route('articles.show',['article'=>$article->id]) }}">More</a>
    </div>

@endforeach
{!! $articles->links() !!}
