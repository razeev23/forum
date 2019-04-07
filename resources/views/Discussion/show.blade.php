@extends('layouts.app')

@section('content')
            {{-- <div class="card">
            <div class="card-header">{{$discussions->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> --}}

            <div class="card mb-2">

                    <div class="card-header" ><img src="{{ $d->user->avatar }}" width="40px" height="40px" alt="avatar">&nbsp;&nbsp;
                    <span>{{ $d->user->name}}, {{$d->created_at->diffForHumans()}}</span>
                 @if ($d->is_being_watched_by_auth_user())
                 <a href="{{ route('discussions.unwatch',['id'=>$d->id])}}" class=" btn btn-info float-right ">unwatch</a>
                     
                 @else
                 <a href="{{ route('discussions.watch',['id'=>$d->id])}}" class=" btn btn-info float-right ">watch</a>
                 @endif
                   
                   </div>
                       <div class="card-body">
                       <div class="text-center">{{$d->title}}</div>
                       <div class="text-center">{{ $d->content}}</div>

                       {{-- best answer display insidet the card body --}}
                    
                       @if ($best_answer)
                       <hr>
                       <div class="text-center p-2"><h3>BEST ANSWER</div>
                       <div class="card card-success p-4">
                        

                            <div class="card-header" ><img src="{{ $best_answer->user->avatar }}" width="40px" height="40px" alt="avatar">&nbsp;&nbsp;
                                <span>{{ $best_answer->user->name}}</span>
                            </div>
                            <div class="card-body">
                             <div class="text-center">{{$best_answer->title}}</div>
                             <div class="text-center">{{ $best_answer->content}}</div>
                             </div>

                        </div>
                       
                      
                       @endif

                       {{-- end of card body --}}
                       </div>
                       <div class="card-footer">
                           {{$d->replies->count()}}&nbspReplies
                          <a href="{{ route('channel',['slug'=>$d->channel->slug])}}" class="btn btn-white float-right"> {{$d->channel->title}}</a>
                       </div>

                      
            </div>
            @foreach ($d->replies as $r)
            <div class="card mb-2">
            <div class="card-header" ><img src="{{ $r->user->avatar }}" width="40px" height="40px" alt="avatar">&nbsp;&nbsp;
                <span>{{ $r->user->name}}, {{$r->created_at->diffForHumans()}}</span>

                @if (!$best_answer)
                    @if (Auth::id() == $d->user->id)
                    {{-- above if  statement checks if the creator of th discussion is  user then only show to mark as the best answer --}}
                    <a href=" {{route('discussion.reply.best',['id'=>$r->id])}}" class="btn btn-secondary float-right">Mark as bestanswer</a>
                        
                    @endif
                    
                @endif
               
               
               </div>
                   <div class="card-body">
                   <div class="text-center">{{$r->title}}</div>
                   <div class="text-center">{{ $r->content}}</div>
                </div>
                <div class="card-footer">
                    @if ($r->is_liked_by_auth_user())
                        <a href="{{route('reply.unlike',['id'=>$r->id])}}" class="btn btn-danger">Unlike <span class="badge">{{$r->Like->count()}}</a>
                    @else
                <a href="{{route('reply.like',['id'=>$r->id])}}" class="btn btn-success">Like <span class="badge">{{ $r->Like->count()}}</span></a>
                    @endif
                </div>
            </div>
                
            @endforeach

            <div class="card">
            @if(Auth::check())
            <form action="{{ route('discussions.reply',['id'=>$d->id ])}}" method="post">
                @csrf
              
            
               <div class="card-body">
                    <label for="reply" class="text-center"> leave a reply</label>
                   <div class="form-group">
                       <textarea name="reply" id="reply" cols="115" rows="10" class="form-control"></textarea>
                   </div>
                   <div class="form-group">
                       <button class="btn btn-info" type="submit">leave a reply</button>
                   </div>
               </div>
                </form>
             @else 
                <div class="text-center"><h4>sign in to like and leave a reply</h4></div>
            </div>
            @endif
    
@endsection
