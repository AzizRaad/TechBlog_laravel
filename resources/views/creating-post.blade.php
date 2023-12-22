<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="/create-post" method="POST">
            @csrf
            <div class="form-group">
                <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
                <input value="{{ old('title') }}" required name="title" id="post-title"
                    class="form-control form-control-lg form-control-title" type="text" placeholder=""
                    autocomplete="off" />
                @error('title')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
                <textarea required name="body" id="post-body" class="body-content tall-textarea form-control" type="text">{{ old('body') }}</textarea>
                @error('body')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-warning active">
                    <input name="category[]" type="checkbox" id="option1" autocomplete="off" checked value="1">
                    Web
                </label>
                <label class="btn btn-warning">
                    <input name="category[]" type="checkbox" id="option2" autocomplete="off" value="2"> Mobile
                </label>
                <label class="btn btn-warning">
                    <input name="category[]" type="checkbox" id="option3" autocomplete="off" value="3"> AI
                </label>
                <label class="btn btn-warning">
                    <input name="category[]" type="checkbox" id="option4" autocomplete="off" value="4"> Cyber
                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save New Post</button>
            </div>
        </form>
    </div>
</x-layout>
