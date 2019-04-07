
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Channel</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <table class="table table-hover">
                        <thead>
                            
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            

                        </thead>
                        <tbody>
                            @foreach ($channels as $channel)
                            <tr>
                            <td>{{$channel->title}}</td>
                                <td>
                                <a href="{{ route('channels.edit', ['channel'=>$channel->id])}}" class="btn btn-xs btn-info">Edit</a>
                                </td>
                                <td>
                                <form method="POST" action="{{route('channels.destroy',['channel'=>$channel->id])}}">
                                @csrf
                                {{ method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit">Destroy</button>
                                </form>
                                   
                                    </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
