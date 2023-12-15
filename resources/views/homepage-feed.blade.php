<x-layout>
    <div class="container py-md-5 container--narrow">
      <h2 class="text-center mb-4"> Latest Posts on The Blog </h2>
      <div class="list-group">
        @php
            $posts = App\Models\Post::orderByDesc('created_at')->get();
        @endphp
        @foreach ($posts as $post)
        <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
          {{-- <img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /> --}}
          <strong>{{$post->title}}</strong>
          <span class="text-muted small">by {{$post->author}} <strong>on</strong> {{$post->created_at->format('n/j/Y')}}</span>
        </a>
        @endforeach
      </div>
    </div>
</x-layout>