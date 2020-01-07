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

<div class="form-group">
    <label for="active">Actief</label>
    @if ((old('active') ?? $blog->active) == 1)
        <input type="checkbox" name="active" class="form-control" id="active" checked="checked"></input>
    @else
        <input type="checkbox" name="active" class="form-control" id="active"></input>
    @endif
</div>

@error('author')
    @component('components.alert') {{ $message }} @endcomponent
@enderror
