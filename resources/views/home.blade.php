@extends('layouts.app')


@section('css')
    <style>

        .btn {
            margin-left: 10px;
            margin-right: 10px;
        }
        /* Boostrap Buttons Styling */
        
        .btn-default {
            font-family: Raleway-SemiBold;
            font-size: 13px;
            color: rgba(108, 88, 179, 0.75);
            letter-spacing: 1px;
            line-height: 15px;
            border: 2px solid rgba(108, 89, 179, 0.75);
            border-radius: 40px;
            background: transparent;
            transition: all 0.3s ease 0s;
        }
        
        .btn-default:hover {
            color: red;
            background: rgba(108, 88, 179, 0.75);
            border: 2px solid rgba(108, 89, 179, 0.75);
        }

        .img{
            width: 270px;
            height: 200px;
            margin-top: 10px;

        }
        /*            img:hover{
                        width: 280px;
                        height: 210px;
                    }*/
        h4:hover{
            color: violet;
            font: bold;

        }
        
    </style>
    
@endsection

@section('content')

<div class="container">
    <div class="row">
            @include('include.homenav')
    </div>
        
    <div class="row">
            @include('include.sidenav')
            
            <div class="col-md-9" >
                
                @if (Auth::user()->user_img !== "null")
                
                    @if(Session::has('name'))
                        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Thank You {{ Session::get('name') }} For Your Suggestion </strong>
                        </div>
                    @endif

                    @foreach ($blogs as $blog)
                <div class="row table-bordered">
                  
                    <div class="col-md-4">
                        
                        <img src="{{ asset('img').'/'.$blog->img }} " alt="Image Not Found" class="img img-responsive img-rounded"/>
                    </div>
                    <div class="col-lg-8" >
                            <div class="row">
                                <div>
                                        <h4 class=""><strong> {{ $blog->name }}</strong></h4>
                                        <h6>Location: {{ $blog->placelocation }} </h6>
                                        
                                        <p class="">{{ $blog->placedesc }}</p>
                                </div>
                                <div>
                                    @if (\App\LikeDislike::where('user_id', Auth::user()->id)->where('place_id', $blog->id)->first() == null)
                                        <button class="btn btn-link" onclick="likePlace({{$blog->id}})" > <i class="fa fa-thumbs-up" id="like-{{$blog->id}}" style="color: #428bca" aria-hidden="true"></i></button>
                                        
                                        <button class="btn btn-link" onclick="dislikePlace({{$blog->id}})" > <i class="fa fa-thumbs-down" id="dislike-{{$blog->id}}" style="color: #428bca" aria-hidden="true"></i></button>
                                           
                                    @elseif(\App\LikeDislike::where('user_id', Auth::user()->id)->where('place_id', $blog->id)->first()->like_status == 1)
                                        <button class="btn btn-link" onclick="likePlace({{$blog->id}})" ><i class="fa fa-thumbs-up" id="like-{{$blog->id}}" style="color:red " aria-hidden="true"></i></button>
                                        
                                        <button class="btn btn-link" onclick="dislikePlace({{$blog->id}})" > <i class="fa fa-thumbs-down" id="dislike-{{$blog->id}}" style="color:#428bca " aria-hidden="true"></i></button>
                                        
                                    @elseif(\App\LikeDislike::where('user_id', Auth::user()->id)->where('place_id', $blog->id)->first()->like_status == 0)
                                        <button class="btn btn-link" onclick="likePlace({{$blog->id}})" > <i class="fa fa-thumbs-up" id="like-{{$blog->id}}" style="color:#428bca " aria-hidden="true"></i></button>
                                        
                                        <button class="btn btn-link" onclick="dislikePlace({{$blog->id}})"> <i class="fa fa-thumbs-down" id="like-{{$blog->id}}" style="color:red " aria-hidden="true"></i></button>
                                        
                                    @endif                                  
                                </div>
                            </div>
                        </div>
    
                </div>
                @endforeach
                @else
                <script>window.location = '/profile/'+{{Auth::user()->id}};</script>
                @endif
                    
                    <div class="col-md-offset-4">
                            {{ $blogs->links() }}
                    </div>
                </div>
    </div>
</div>

@endsection

@section('script')
    <script>
            function likePlace(id){
                $.post('{{ route('like') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
                    $('#like-'+id).css("color", "red");
                    $('#dislike-'+id).css("color", "#428bca");
                    
                    
                });
            }

            function dislikePlace(id){
                $.post('{{ route('dislike') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
                    $('#dislike-'+id).css("color", "red");
                    $('#like-'+id).css("color", "#428bca");
                    
                });
            }
    </script>
@endsection
