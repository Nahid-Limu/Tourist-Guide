@extends('layouts.app')


@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

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
            #map {
                height: 400px;
                width: 100%;
            }
        </style>
@endsection

@section('content')

<div class=" container">
        <div class=" jumbotron">
                <h2 class="container text-center text-danger">View Place Details
                        @if (Auth::user()->role == 'Admin')
                        <a href="{{ route('approve') }}" class="btn btn-default pull-right"><span class="fa fa-arrow-left" ></span> Go Back </a>
                        @else
                        <a href="{{ route('suggestedplace') }}" class="btn btn-default pull-right"><span class="fa fa-arrow-left" ></span> Go Back </a>
                        @endif
                </h2>
        </div>
        @isset($place->id)
        <div class="row container">
        <div class="col-md-6 jumbotron">
                
                            
                            
                            <h2 class="text-capitalize">{{ $place->placename }}</h2>
                            <p class="text-capitalize">{{'Division:'}} {{ $place->cityname }}</p>
                            <small class="text-capitalize"><b>{{'Type:'}} {{ $place->tag }}</b></small>
                            <br>
                            
                            <img src="{{ asset('img').'/'.$place->placeimage }}" alt="alt text" style="width: 100%; height: 300px;">
                            <h1>Overview</h1>
                            <p class="table-bordered">{{ $place->overview }}</p>
                    
                            <div class="jumbotron">
                                    <h3 class="text-center">Transport System And Cost</h3>
                                    <h5 class="text-center">(Per Person)</h5>
                                <ul class="list-group">
                                   
                                    <li class="list-group-item d-flex justify-content-between align-items-center"><b>From</b> <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b id="tsfrom"> </b>
                                            
                                    </li>
                                    <br>
                                    <li class="list-group-item d-flex justify-content-between align-items-center"><b>To</b> <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b id="tsto"> </b>
                                        
                                    </li>
                                    <br>
                                    @if ($place->bus > 0 )
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-bus" style="font-size:25px;color:blue"></i> BY BUS
                                            <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b style="font-size: 15px; "><kbd>{{ $place->bus }}</kbd>Tk</b>
                                        </li>
                                    @endif
                                    <br>
                                    @if ( $place->train > 0 )
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-train" style="font-size:25px;color:red"></i> BY TRAIN
                                            <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b style="font-size: 15px; "><kbd>{{ $place->train }} </kbd>Tk</b>
                                        </li>
                                    @endif
                                    <br>
                                    @if ( $place->air > 0 )
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-plane" style="font-size:25px;color:aqua"></i> BY AIR
                                            <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b style="font-size: 15px; "><kbd>{{ $place->air }} </kbd>Tk</b>
                                        </li>
                                    @endif
                                    <br>
                                    @if ( $place->ship > 0 )
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-ship" style="font-size:25px;color:black"></i> BY SHIP
                                            <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b style="font-size: 15px; "><kbd>{{ $place->ship }} </kbd>Tk</b>
                                        </li>
                                    @endif
                                    <br>
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><b>Distance in KM:</b>
                                            <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b><kbd id="in_kilo"></kbd> km</b>
                                        </li>
                                        <br>
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><b>Approximate  Time:</b>
                                                <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b><kbd id="duration_text" ></kbd></b>
                                        </li>
                                    
                                    
                                  </ul>
                            </div>
              </div>
              
              <div class="col-md-6 jumbotron">
                    <div class="jumbotron">
                        <h3 class="text-center">Living Place And Cost</h3>
                        <h5 class="text-center">(Per Person)</h5>
                        <table class="ta table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Hotel Name</th>
                                <th>Type</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                @foreach ($place->hotels as $key => $hotel)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$hotel->hotel_name}}</td>
                                        <td>{{$hotel->hotel_type}}</td>
                                        <td>{{$hotel->hotel_price}}</td>
                                    </tr>    
                                @endforeach
                                
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="table table-bordered">

                        <h3 class="text-center text-danger">Place Location In Map</h3>
                        <input id="src" value="{{ $place->placename }}"  type="hidden">
                        
                        <div id="map" style="margin-top: 20px;"></div>
                            
                    </div>
                    <br>
                    
                    @if (isset($reviews->place_id))
                    <div class="jumbotron center-block">
                            
                            <div class="rating">
                                    <h3 class="product-title text-center">Place Review</h3>
                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $avg }}" data-size="xs">
                
                                <span class="review-no">{{ $count }} reviews</span>
                
                            </div>
                            
                    </div>
                    @else
                    <div class="jumbotron center-block">
                            
                            <div class="rating">
                                    <h3 class="product-title text-center">Place Review</h3>
                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $avg }}" data-size="xs"  aria-required="true">
                
                                <span class="review-no">{{ $count }} reviews</span>
                
                            </div>
                            
                    </div>
                    <div class="jumbotron center-block">
                            
                            {!! Form::open(array('route' => 'review', 'files'=> true)) !!}

                            <div class="rating">
                                    <h3 class="product-title text-center">Your Review</h3>
                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="" data-size="xs">
                
                                <input type="hidden" name="user_id" required="" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="place_id" required="" value="{{ $place->id }}">
                
                                <br/>
                
                                <button class="btn btn-default btn-info col-md-push-3">Submit Review</button>
                
                            </div>
                            {!! Form::close() !!}
                    </div>
                    @endif
                    
                   
                    <div>
                        @if (Auth::user()->role == 'Admin')
                        
                        <a href="{{ route('deleteUserPost', $place->id) }}" class="btn btn-default btn-danger pull-right btn-primary"><i class="fa fa-trash" style=""></i> Delete </a>
                        <a href="{{ route('approvePost', $place->id) }}" class="btn btn-default  btn-primary"><i class="fa fa-check" style=""></i> Approve </a>
                        @endif
                            
                            
                    </div>
              </div>
            </div>
            @endisset    
              
</div>


@endsection

@section('script')
    <script type="text/javascript">
        $(function () {

            setTimeout(function() {
                $('#successMessage').fadeOut('fast');
                }, 1000);
                
                $("#successMessage").fadeTo(1000, 500).slideUp(500, function(){
                    $("#successMessage").alert('close');
                });
        });
    </script>
    <script type="text/javascript" src="{{ asset('js/mymap.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    
    
    <script>
            $(document).ready(function(){
               initMap(); 
               
            });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{--  <script  defer src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyDmrAS_-ei8sdgIFHpKTFGp_xGtKfP5F2c"  type="text/javascript"></script>  --}}
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    
    <script type="text/javascript">

        $("#input-id").rating();
    
    </script>
    
@endsection