@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <form action="{{ route('posts') }}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Write Something..."></textarea>
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded font-medium">Post</button>
            </div>
        </form>
        @if($posts->count())
            @foreach($posts as $post)
                <div class="mb-4">
                    <a href="" class="font-bold text-yellow-800">{{ $post->user->name }}</a>
                    <span class="text-gray-600 text-sm">-{{ $post->created_at->diffForHumans() }}</span>
                    <p class="mb-2">{{ $post->body }}</p>
                    @auth
                    @if ($post->ownedby(auth()->user()))

                    <div>
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-blue-500"> Delete &nbsp;</button>
                        </form>
                    </div>
                    @endif
                    @endauth
                    <div class="flex items-center">
                        @auth
                            @if(!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post->id) }}"
                                    method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500 flex">Like</button>
                                </form>
                            @else
                                <form action="{{ route('posts.likes', $post->id) }}"
                                    method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500"> Unlike &nbsp;</button>
                                </form>
                            @endif
                           
                        @endauth
                        <span class="flex">{{ $post->likes->count() }}
                            {{ Str::plural('like',$post->likes->count()) }}&nbsp; <svg
                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                            </svg></span>
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        @else
            <div>
                No Posts Available
            </div>
        @endif
    </div>

</div>
@endsection
