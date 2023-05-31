@extends('dashboard')

@section('content')

    <div class="flex py-[5em] justify-center">
        <div class="container w-3/5 flex flex-col gap-[2rem]">

            <div class="top_container grid place-items-center">
                <img src="{{asset('blogImages/'.$data->image)}}" alt="" srcset="">
            </div>
            <div class="bottom_container flex flex-col gap-[1.45em]">
                <div class="heading_container flex flex-col gap-[0.75em]">
                    <span class="text-4xl">
                        {{$data->title}}
                    </span>
                    <span class="text-sm">
                        {{$data->updated_at->format('d-m-Y')}}
                    </span>
                    <span class="text-sm">
                        @if ($data->rating==0)
                            No rating yet...
                        @else
                            Rating: 
                            @for ($i=1;$i<=$data->rating;$i++)
                            <i class="fa-solid fa-star text-[#fcb603]"></i>
                            @endfor
                        @endif
                    </span>
                </div>
                <div class="content_container flex flex-col gap-[1.35em]">
                    <p class="leading-8">
                        {{$data->content}}
                    </p>

                    <div class="">
                        <a href="{{route('mainContent')}}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Back</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection