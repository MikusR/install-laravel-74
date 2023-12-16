<form action="{{ route('articles.store') }}" method="post">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        @if($errors->has('title'))
            <p>{{ $errors->first('title') }}</p>
        @endif
    </div>
    <div>
        <label for="short_description">Short description:</label>
        <textarea name="short_description" id="short_description">{{ old('short_description') }}</textarea>
        @if($errors->has('short_description'))
            <p>{{ $errors->first('short_description') }}</p>
        @endif
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
        @if($errors->has('description'))
            <p>{{ $errors->first('description') }}</p>
        @endif
    </div>
    <div>
        <label for="image">Image:</label>
        <input type="text" name="image" id="image" value="{{ old('image') }}">
        @if($errors->has('image'))
            <p>{{ $errors->first('image') }}</p>
        @endif
    </div>
    <button type="submit">Submit</button>
</form>
