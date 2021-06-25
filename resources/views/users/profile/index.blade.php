@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-8/12">
        <div class="p-6">
            <h1 class="text-2xl font-medium mb-1 text-blue-900">{{ $user->name }}</h1>
            <p class="flex"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                        clip-rule="evenodd" />
                </svg>&nbsp;Posted {{ $posts->count() }}
                {{ Str::plural('post', $posts->count()) }}</p>
            <p class="flex"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                </svg> &nbsp;Received {{ $user->receivedLikes->count() }} Likes</p>
        </div>

        <div class="bg-white p-6 rounded-lg">
            @if($posts->count())
                @foreach($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                {{ $posts->links() }}
            @else
                <div>
                    No Posts Available
                </div>
            @endif
        </div>

    </div>

</div>
@endsection
