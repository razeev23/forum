@extends('layouts.app')

@section('content')
         @foreach ($discussions as $d)
             <div class="card mb-2">

             <div class="card-header" ><img src="{{ $d->user->avatar }}" width="40px" height="40px" alt="avatar">&nbsp;&nbsp;
             <span>{{ $d->user->name}}, {{$d->created_at->diffForHumans()}}</span>
             <a href="{{ route('discussion',[$d->slug])}}" class=" btn btn-info float-right ">View</a>
            
            </div>
                <div class="card-body">
                <div class="text-center">{{$d->title}}</div>
                <div class="text-center">{{str_limit($d->content,10)}}</div>
                </div>
                <div class="card-footer">
                    {{$d->replies->count()}}&nbspReplies
                </div>
             </div>
         @endforeach

         <div class="text-center">
             {{-- //to show the pagination set in th controller of it --}}
             {{-- {{ $discussions->links()}} --}}
         </div>
@endsection
