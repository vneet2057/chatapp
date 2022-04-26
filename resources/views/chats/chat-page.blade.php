    @extends('layouts.master')
    @section('content')
    @inject('carbon', 'Carbon\Carbon')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-3 border pt-3">
                <input type="text" class="form-control mb-4" placeholder="search here">
                <ul class="list-group p-1" style=" width: 100%;height: 80vh; overflow: scroll; overflow-x: hidden;">
                    @foreach($chat_one as $c)
                    
                    <a onclick="getMessage(`{{$c->chat_id}}`,`{{$c->id}}`)" style="text-decoration: none;">
                        <li class="list-group-item d-flex">
                            <div class="user-image" style="position: relative; height:50px; width:50px; border-radius:50%; background:url('https://source.unsplash.com/random'); background-size:cover;background-repeat:no-repeat">
                                @if(Cache::has('user-is-online-' . $c->id))
                                <div class="online" style="height: 15px; width:15px; border-radius:50%; background:#32CD32; position:absolute; bottom:1px; right:1px; border:2.5px solid #fff">

                                </div>
                                @else
                                <div class="online" style="height: 15px; width:15px; border-radius:50%; background:#aaaaaa; position:absolute; bottom:1px; right:1px; border:2.5px solid #fff">

                                </div>
                                @endif
                            </div><!-- user image -->
                            <div class="ms-3">
                                <span style="font-weight: 600;">{{$c->f_name}} {{$c->m_name}} {{$c->l_name}}</span><br>
                                <span>{{$carbon::parse($c->last_seen)->diffForHumans() }}</span>
                            </div>

                        </li>
                    </a>


                    @endforeach
                    @foreach($chat_two as $c)

                    <a onclick="getMessage(`{{$c->id}}`)" style="text-decoration: none;">
                        <li class="list-group-item d-flex">
                            <div class="user-image" style="position: relative; height:50px; width:50px; border-radius:50%; background:url('https://source.unsplash.com/random'); background-size:cover;background-repeat:no-repeat">
                                @if(Cache::has('user-is-online-' . $c->id))
                                <div class="online" style="height: 15px; width:15px; border-radius:50%; background:#32CD32; position:absolute; bottom:1px; right:1px; border:2.5px solid #fff">

                                </div>
                                @else
                                <div class="online" style="height: 15px; width:15px; border-radius:50%; background:#aaaaaa; position:absolute; bottom:1px; right:1px; border:2.5px solid #fff">

                                </div>
                                @endif
                            </div><!-- user image -->
                            <div class="ms-3">
                                <span style="font-weight: 600;">{{$c->f_name}} {{$c->m_name}} {{$c->l_name}}</span><br>
                                <span>{{$carbon::parse($c->last_seen)->diffForHumans() }}</span>
                            </div>

                        </li>
                    </a>


                    @endforeach

                </ul>
            </div>
            <div class="col-lg-6" style="height: 88vh; position: relative;">
                <div class="contianer-fluid0" id="message-box">
                    <div class="row m-3">
                        <div class="col-lg-12 d-flex justify-content-center align-items-center" style="height: 400px;">
                            <span class="text-center">select a conversation</span>
                        </div>


                    </div>
                    <!-- <div class="row m-3 justify-content-end">
                        <div class="col-lg-6 bg-primary rounded border border-light text-white">
                            <h1>text</h1>
                        </div>


                    </div> -->
                </div>
                <div class="inputs" style="position: absolute; width:97%; bottom:0px;">
                    <form action="">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control">
                            <div class="image-upload">
                                <label for="file-input" style="padding: 10px; border: 1px solid;margin: 3px 3px;">

                                    <img src="https://cdn2.iconfinder.com/data/icons/pittogrammi/142/95-512.png" width="20px" alt="">
                                </label>

                                <input id="file-input" type="file" />
                            </div>
                            <svg width="50px" height="50px" viewBox="0 0 24 24" class="crt8y2ji">
                                <path d="M16.6915026,12.4744748 L3.50612381,13.2599618 C3.19218622,13.2599618 3.03521743,13.4170592 3.03521743,13.5741566 L1.15159189,20.0151496 C0.8376543,20.8006365 0.99,21.89 1.77946707,22.52 C2.41,22.99 3.50612381,23.1 4.13399899,22.8429026 L21.714504,14.0454487 C22.6563168,13.5741566 23.1272231,12.6315722 22.9702544,11.6889879 C22.8132856,11.0605983 22.3423792,10.4322088 21.714504,10.118014 L4.13399899,1.16346272 C3.34915502,0.9 2.40734225,1.00636533 1.77946707,1.4776575 C0.994623095,2.10604706 0.8376543,3.0486314 1.15159189,3.99121575 L3.03521743,10.4322088 C3.03521743,10.5893061 3.34915502,10.7464035 3.50612381,10.7464035 L16.6915026,11.5318905 C16.6915026,11.5318905 17.1624089,11.5318905 17.1624089,12.0031827 C17.1624089,12.4744748 16.6915026,12.4744748 16.6915026,12.4744748 Z" fill="#0084ff"></path>
                            </svg>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 pt-3 text-center border">
                <ul style="list-style: none;">
                    <li>
                        <img id="profile_image    " src="https://source.unsplash.com/random" style="width: 150px; height: 150px; border-radius: 50%;" alt="">

                    </li>
                    <li>
                        <span id="profile_namee" style="font-weight: bold;font-size: 30px;">Amit Karki</span>
                    </li>
                    <li>
                        <span style="font-weight: 200;">Active now</span>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>

    <style>
        .image-upload>input {
            display: none;
        }
    </style>

    <script>
        const getMessage = (e,user_id) => {
            var id = e;
            console.log(id)
            var user = `{{auth()->user()->id}}`
            console.log(user);
            var selected_user_id = user_id;
            console.log(selected_user_id)

            getProfile(selected_user_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                url: '/get-message/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    for (let i = 0; i < data.data.length; i++) {
                        console.log(data.data[0].message)
                        $('#message-box').empty();
                        if(data.data[i].user_id == user)
                        {
                            $('#message-box').append(`<div class="row m-3 justify-content-end"><div class="col-lg-12"><div><span class="p-2 bg-light rounded border border-primary">${data.data[i].message}</span></div></div></div>`)
                        }
                        else{
                            $('#message-box').append(`<div class="row m-3"><div class="col-lg-12"><div><span class="p-2 bg-light rounded border border-primary">${data.data[i].message}</span></div></div></div>`)
                        }
                    }
                },
                error: function(data) {
                    console.log(data);

                }
            });
        }

        const getProfile = (id) =>{
            var user_id = id

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                url: '/get-profile/' + user_id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    
                },
                error: function(data) {
                    console.log(data);

                }
            });
        }
    </script>
    @endsection