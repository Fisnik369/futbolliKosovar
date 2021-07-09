@extends('layouts.app')

@section('content')

    <div class= "row">
        <div class="col-md-3">
            <div class="users">
                
                <h5>Users </h5>
                    <ul class="list-group list-chat-item">
                        @if($users->count())
                             @foreach($users as $user)
                                    <li class="chat-user-list">
                                        <a href="{{route('message.conversation', $user->id)}}">
                                          <div class="chat-name font-weight-bold">

                                            {{$user->name }}
                                          </div>
                                            
                                        </a>
                                    </li>
                            @endforeach
                        @endif    
                    </ul>
                
            </div>

        </div>

        <div class="col-md-9">

            <h1>
                Message Section
            </h1>
            <p class="lead">
            Selekto perdoruesin me te cilin deshiron te bisedosh

            </p>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        $(function(){
            let user_id = "{{ auth()->user()->id }}";
            let ip_address = '127.0.0.1';
            let socket_port = '8005';
            let socket = io(ip_address + ':' + socket_port);

            socket.on('connect', function(){
                alert('here');
                socket.emit('user_connected', user_id);

            });

            socket.on('updateUserStatus', (data) =>{
                console.log(data);
                $.each(data, function(key, val){
                    if(val !== null && val !==0){
                        console.log(key);
                        

                    }
                });
            });

        });
    </script>

@endpush