@csrf
<div class="form-group">
    <label for="title">Titel</label>
    <input name="title" class="form-control" id="title" value="{{ old('title') ?? $blog->title }}"></input>
</div>

@error('title')
    @component('components.alert') {{ $message }} @endcomponent
@enderror

<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" class="form-control" id="content" rows="3">{{ old('content') ?? $blog->content }}</textarea>
</div>

@error('content')
    @component('components.alert') {{ $message }} @endcomponent
@enderror

<div class="form-group">
    <label for="author">Auteur</label>
    <input name="author" class="form-control" id="author" value="{{ old('author') ?? $blog->author }}"></input>
</div>

@error('author')
    @component('components.alert') {{ $message }} @endcomponent
@enderror
