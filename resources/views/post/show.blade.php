<x-layout>
    <h1>{{$post->title}}</h1>
    <img src='/img/posts/{{$post->cover_image_path}}' alt="{{$post->title}}">
    <p>{{$post->content}}</p>
</x-layout>