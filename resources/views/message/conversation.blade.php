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
                                        <a href="{{ route('message.conversation', $user->id)}}">
                                            {{$user->name }}
                                        </a>
                                    </li>
                            @endforeach
                        @endif    
                    </ul>
                
            </div>

        </div>

        <div class="col-md-9 chat-section">

            <div class="chat-header">

                <div class="chat-name font-weight-bold">
                    {{ $user->name }}
                </div>

            </div>

            <div class="chat-body" id="chatBody">
                <div class="message-listing" id="messageWrapper">
                    {{-- <div class="row">
                        <div class="row message align-item-center mb-2">
                            <div class="col-md-12 user-info">
                                {{-- <div class="chat-image">
                                    {{ $user->name }}
                                </div> --}}
                                {{-- <div class="chat-name font-weight-bold">
                                    Manohar Khadka
                                    <span class="small time text-gray-500" title="2020-05-06 10:30 PM">
                                        10:30 PM
                                    </span>
                                </div>

                            </div>
                            <div class="col-md-12 message-content">
                                <div class="message-text">
                                    Message Here
                                </div>
                            </div>
                        </div>
                    </div> --}} 

                </div>

            </div>

            <div class="chat-box">
                <div class="chat-input bg-white" id="chatInput" contenteditable="">


                </div>
                <div class="chat-input-toolbar">
                    <button title="Add file" class="btn btn-light btn-sm btn-file-upload">
                        <i class="fa fa-paperclip"> <b>C</b></i>
                    </button> |

                    <button title="Bold" class="btn btn-light btn-sm tool-items" onclick="document.execCommand('bold', false, '');"> 
                        <i class="fa fa-bold tool-icon"> <b>B</b></i>

                    </button> |
                    <button title="Italic" class="btn btn-light btn-sm tool-items" onclick="document.execCommand('italic', false, '');">
                        <i class="fa fa-italic tool-icon"> <b>I</b> </i>
                    </button>

                </div>
            </div>


           
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        $(function(){

            let $chatInput = $('.chat-input');
            let $chatInputToolbar = $('.chat-input-toolbar');
            let $chatBody = $('.chat-body');
            let $messageWrapper = $("#messageWrapper");


            let user_id = "{{ auth()->user()->id }}";
            let ip_address = '127.0.0.1';
            let socket_port = '8005';
            let socket = io(ip_address + ':' + socket_port);
            let friendId = "{{ $friendInfo->id }}";

            socket.on('connect', function(){
                alert('here');
                socket.emit('user_connected', user_id);

            });

            // socket.on('updateUserStatus', (data) =>{
            //     console.log(data);
            //     $.each(data, function(key, val){
            //         if(val !== null && val !==0){
            //             console.log(key);
                        

            //         }

            //     });
            // });

           

            $chatInput.keypress(function (e) {
               let message = $(this).html();
               if (e.which === 13 && !e.shiftKey) {
                   $chatInput.html("");
                   sendMessage(message);
                //    return false;
               }
            });
            function sendMessage(message) {
                let url = "{{ route('message.send-message') }}";
                let form = $(this);
                let formData = new FormData();
                let token = "{{ csrf_token() }}";
                formData.append('message', message);
                formData.append('_token', token);
                formData.append('receiver_id', friendId);
                
                appendMessageToSender(message);

                $.ajax({
                   url: url,
                   type: 'POST',
                   data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'JSON',
                   success: function (response) {
                       if (response.success) {
                           console.log(response.data);
                       }
                   }
                });

            }

            function appendMessageToSender(message) {
                let name = '{{ $myInfo->name }}';
                
                let userInfo = '<div class="col-md-12 user-info">\n' +
                    
                    '<div class="chat-name font-weight-bold">\n' +
                    name +
                    // '<span class="small time text-gray-500" title="'+getCurrentDateTime()+'">\n' +
                    // getCurrentTime()+'</span>\n' +
                    '</div>\n' +
                    '</div>\n';
                let messageContent = '<div class="col-md-12 message-content">\n' +
                    '                            <div class="message-text">\n' + message +
                    '                            </div>\n' +
                    '                        </div>';
                let newMessage = '<div class="row message align-items-center mb-2">'
                    +userInfo + messageContent +
                    '</div>';
                $messageWrapper.append(newMessage);
            }

            function appendMessageToReceiver(message) {
                let name = '{{ $friendInfo->name }}';
                
                let userInfo = '<div class="col-md-12 user-info">\n' +
                    
                    '<div class="chat-name font-weight-bold">\n' +
                    name +
                    // '<span class="small time text-gray-500" title="'+getCurrentDateTime()+'">\n' +
                    // getCurrentTime()+'</span>\n' +
                    '</div>\n' +
                    '</div>\n';
                let messageContent = '<div class="col-md-12 message-content">\n' +
                    '                            <div class="message-text">\n' + message.content +
                    '                            </div>\n' +
                    '                        </div>';
                let newMessage = '<div class="row message align-items-center mb-2">'
                    +userInfo + messageContent +
                    '</div>';
                $messageWrapper.append(newMessage);
            }


            
            socket.on('private-channel:App\\Events\\PrivateMessageEvent', function (message)
            {
               appendMessageToReceiver(message);
            });

            

        });
    </script>

@endpush