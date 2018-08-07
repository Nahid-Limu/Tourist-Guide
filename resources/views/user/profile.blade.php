@extends('layouts.app')

@section('css')
    <style>
        .img{
            width: 270px;
            height: 200px;
            margin-top: 10px;
            
        }
    
        h4:hover{
            color: violet;
            font: bold;
            
        }
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
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
            @include('include.homenav')
    </div>
        
    <div class="row">
            @include('include.sidenav')
            <div class="container col-lg-9" >
               
                <div class="row">
                   
                    
                        <h3 class="text-center text-info">User Profile</h3>
                   
                        
                    @if(Session::has('message'))
                        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> {{ Session::get('message') }} </strong>
                        </div>
                    @endif

                    
                    <div class="col-md-6" >
                        <h3 class="text-center text-danger">User Info</h3>
                        
                                <div class="form-group">
                                        <form class="form-horizontal" method="POST" action="{{ route('updateUser',$user->id) }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                    <table class="table table-responsive table-bordered" style="width:100%;">
                        
                                            
                                                <tr >
                                                    <td ><b class="form-control"> Full Name:</b></td>
                                                    <td><input class="form-control" type="text" name="fname" id=""  required="1" placeholder="" value="{{$user->fname }}"></td>
                                                </tr>
                                                <tr >
                                                    <td ><b class="form-control"> User Name:</b></td>
                                                    <td><input class="form-control" type="text" name="name" id=""  required="1" placeholder="" value="{{$user->name }}"></td>
                                                </tr>
                                                <tr >
                                                    <td ><b class="form-control"> User Email:</b></td>
                                                    <td><input class="form-control" type="email" name="email" id="" required="1" placeholder="" value="{{$user->email }}"></td>
                                                </tr>
                                                <tr >
                                                    <td ><b class="form-control"> User Image:</b></td>
                                                    <td><input class="form-control" type="file" name="userImg" id=""  style="width: 120px;" ></td>
                                                </tr>
                                                
                                                
                                                <tr >
                                                        
                                                    <td colspan="2">
                                                            <button type="submit" class="btn btn-default btn-primary form-control" name="submit" >Update User</button>
                                                    </td>
                                                
                                                </tr>
                                    
                                    </table>
                                        </form>
                                </div>
                        
                    </div>
                    <div class="col-md-6" >
                        <h3 class="text-center text-danger">User Details</h3>
                        
                            @if (isset($user->userDetails->id ))
                            <div class="form-group">
                                    {!! Form::open( array('route' => array('UpdateDetails')) ) !!}
                                    <table class="table table-responsive table-bordered">
                        
                                            
                                        <!--Info Collect -->
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like Beach:</label>
                
                                            </td>
                
                                            <td >
                                                <h5 class="form-control text-center text-info">
                                                    <input type="radio" name="beach" value="beach" required <?php if($user->userDetails->beach == "beach") echo "checked"?>  /> Yes
                                                    <input type="radio" name="beach" value="null" <?php if($user->userDetails->beach == 'null') echo "checked"?> /> No
                
                                                </h5>
                                                
                                            </td>
                                        </tr>
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like Hill station:</label>
                
                                            </td>
                
                                            <td class="text-center">
                
                                                <h5 class="form-control text-info">
                                                    <input type="radio" name="hill_station" value="hill" required <?php if($user->userDetails->hill == "hill") echo "checked"?> /> Yes
                                                    <input type="radio" name="hill_station" value="null" <?php if($user->userDetails->hill == 'null') echo "checked"?> /> No
                
                                                </h5>
                                            </td>
                                        </tr>
                
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like To visit Museum:</label>
                
                                            </td>
                
                                            <td class="text-center">
                
                                                <h5 class="form-control text-info">
                                                    <input type="radio" name="museum" value="museum" required <?php if($user->userDetails->museum == "museum") echo "checked"?> /> Yes
                                                    <input type="radio" name="museum" value="null" <?php if($user->userDetails->museum == 'null') echo "checked"?> /> No
                
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like To visit Temple:</label>
                
                                            </td>
                
                                            <td class="text-center">
                
                                                <h5 class="form-control text-info">
                                                    <input type="radio" name="temple" value="temple" required <?php if($user->userDetails->temple == "temple") echo "checked"?> /> Yes
                                                    <input type="radio" name="temple" value="null" <?php if($user->userDetails->temple == 'null') echo "checked"?> /> No
                
                                                </h5>
                                            </td>
                                        </tr>
                                        
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like Water Fall:</label>
                
                                            </td>
                
                                            <td class="text-center">
                
                                                <h5 class="form-control text-info">
                                                    <input type="radio" name="water_fall" value="waterfall" required <?php if($user->userDetails->water_fall == "waterfall") echo "checked"?> /> Yes
                                                    <input type="radio" name="water_fall" value="null" <?php if($user->userDetails->water_fall == 'null') echo "checked"?> /> No
                
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr class="form-group">
                                                <td >
                                                    <label class="form-control" style="margin-top: 10px;">Do You Like Historical Place:</label>
                    
                                                </td>
                    
                                                <td class="text-center">
                    
                                                    <h5 class="form-control text-info">
                                                        <input type="radio" name="historical_place" value="historical" required <?php if($user->userDetails->historical_place == "historical") echo "checked"?> /> Yes
                                                        <input type="radio" name="historical_place" value="null" <?php if($user->userDetails->historical_place == 'null') echo "checked"?> /> No
                    
                                                    </h5>
                                                </td>
                                            </tr>
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like Natural Place:</label>
                
                                            </td>
                
                                            <td class="text-center">
                
                                                <h5 class="form-control text-info">
                                                    <input type="radio" name="natural_place" value="natural" required <?php if($user->userDetails->natural_place == "natural") echo "checked"?> /> Yes
                                                    <input type="radio" name="natural_place" value="null" <?php if($user->userDetails->natural_place == 'null') echo "checked"?> /> No
                
                                                </h5>
                                            </td>
                                        </tr>
                                        <!--Submit Button -->
                                        <tr class="form-group">
                                            <td colspan="2">
                                                <br><button type="submit" class="btn btn-default btn-primary form-control" name="submit" >Add Details</button>
                                            </td>
                                        </tr>
                                    
                                    </table>
                                    {!! Form::close() !!} 
                                    
                                </div>
                            @else
                            <div class="form-group">
                                    {!! Form::open( array('route' => array('addDetails', $user->id)) ) !!}
                                    <table class="table table-responsive table-bordered">
                        
                                            
                                        <!--Info Collect -->
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like Beach:</label>
                
                                            </td>
                
                                            <td >
                                                <h5 class="form-control text-center text-info">
                                                    <input type="radio" name="beach" value="beach" required /> Yes
                                                    <input type="radio" name="beach" value="null" /> No
                
                                                </h5>
                                                
                                            </td>
                                        </tr>
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like Hill station:</label>
                
                                            </td>
                
                                            <td class="text-center">
                
                                                <h5 class="form-control text-info">
                                                    <input type="radio" name="hill_station" value="hill" required/> Yes
                                                    <input type="radio" name="hill_station" value="null"/> No
                
                                                </h5>
                                            </td>
                                        </tr>
                
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like To visit Museum:</label>
                
                                            </td>
                
                                            <td class="text-center">
                
                                                <h5 class="form-control text-info">
                                                    <input type="radio" name="museum" value="museum" required/> Yes
                                                    <input type="radio" name="museum" value="null"/> No
                
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like To visit Temple:</label>
                
                                            </td>
                
                                            <td class="text-center">
                
                                                <h5 class="form-control text-info">
                                                    <input type="radio" name="temple" value="temple" required/> Yes
                                                    <input type="radio" name="temple" value="null"/> No
                
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like Historical Place:</label>
                
                                            </td>
                
                                            <td class="text-center">
                
                                                <h5 class="form-control text-info">
                                                    <input type="radio" name="historical_place" value="historical" required/> Yes
                                                    <input type="radio" name="historical_place" value="null"/> No
                
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like Water Fall:</label>
                
                                            </td>
                
                                            <td class="text-center">
                
                                                <h5 class="form-control text-info">
                                                    <input type="radio" name="water_fall" value="water" required/> Yes
                                                    <input type="radio" name="water_fall" value="null"/> No
                
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr class="form-group">
                                            <td >
                                                <label class="form-control" style="margin-top: 10px;">Do You Like Natural Place:</label>
                
                                            </td>
                
                                            <td class="text-center">
                
                                                <h5 class="form-control text-info">
                                                    <input type="radio" name="natural_place" value="natural" required/> Yes
                                                    <input type="radio" name="natural_place" value="null"/> No
                
                                                </h5>
                                            </td>
                                        </tr>
                                        <!--Submit Button -->
                                        <tr class="form-group">
                                            <td colspan="2">
                                                <br><button type="submit" class="btn btn-default btn-primary form-control" name="submit" >Add Details</button>
                                            </td>
                                        </tr>
                                    
                                    </table>
                                    {!! Form::close() !!} 
                                </div>
                            @endif
                                
                    
                </div>
                    
                </div>
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
@endsection