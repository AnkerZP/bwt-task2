@extends('app')

@inject('countries', 'App\Http\Utilities\Country')

@section('content')
    <div id="map"></div>
    <!-- Form#1 -->
    
    <div class="container">
        @if (session('fuID')!= null)
            <input type="hidden" id="isForm1" value="{{session('fuID')}}" />
        @else
            <input type="hidden" id="isForm1" value="{{(int)-1}}" />
        @endif
        {!! Form::open(['url'=>'', 'data-toggle' => 'validator', 'role' => 'form', 'id' => 'form1']) !!}
            <legend>To participate in the conference, please fill out the form</legend>
            <a href="/members">All Members({{$count}})</a>
            <hr>
            <!--firstname-->
            <div class="form-group">
                {!! Form::label('firstname', 'Firstname:') !!}
                {!! Form::text('firstname', null,['class'=>'form-control', 'required'=>'', 'data-required-error'=>"Field is empty, please fill it with information."]) !!}
                <div class="help-block with-errors"></div>
                <div class="first-error invalid"></div>
            </div>
            <!--lastname-->
            <div class="form-group">
                {!! Form::label('lastname', 'Lastname:') !!}
                {!! Form::text('lastname', null,['class'=>'form-control', 'required'=>'', 'data-required-error'=>"Field is empty, please fill it with information."]) !!}
                <div class="help-block with-errors"></div>
                <div class="last-error invalid"></div>
            </div>
            <!--birthday-->
            <div class="form-group">
                {!! Form::label('birthday', 'Birthday:') !!}
                {!! Form::text('birthday', null,['maxlength'=>'10','class'=>'form-control datepicker-here', 'required'=>'','data-required-error'=>"Field is empty, please fill it with information."]) !!}
                <div class="help-block with-errors"></div>
                <div class="date-error invalid"></div>
            </div>
            <!--country-->
            <div class="form-group">
                {!! Form::label('country', 'Country', ['class' => 'control-label']) !!}
                    <select id="country" name="country" class="form-control">
                        @foreach($countries::all() as $country => $code)
                            <option value="{{ $code }}">{{ $country }}</option>
                        @endforeach
                    </select>
                <div class="country-error invalid"></div>
            </div>
            <!--phone-->
            <div class="form-group">
                {!! Form::label('phone', 'Phone:') !!}
                <div class="input-group">
                    <span class="input-group-addon">+</span>
                    {!! Form::text('phone', null,['class'=>'form-control input-medium bfh-phone','data-format'=>'d (ddd) ddd-dddd','required'=>'','data-required-error'=>"Field is empty, please fill it with information."]) !!}
                </div>
                <div class="help-block with-errors"></div>
                <div class="phone-error invalid"></div>
             </div>
            <!--email-->
            <div class="form-group">
                {!! Form::label('email', 'E-mail:') !!}
                {!! Form::text('email', null, ['class'=>'form-control','required'=>'','data-required-error'=>"Incorrect email address, please use the following format: test@site.com."]) !!}
                <div id="isValid" class="help-block with-errors"></div>
                <div class="email-error invalid"></div>
            </div>
            <!--report-->
            <div class="form-group">
                {!! Form::label('report', 'Report subject:') !!}
                {!! Form::text('report', null,['class'=>'form-control', 'required'=>'','data-required-error'=>"Field is empty, please fill it with information."]) !!}
                <div class="help-block with-errors"></div>
                <div class="report-error invalid"></div>
            </div>
            <!--button-->
            <div class="form-group">
                <div class="button-right">
                    <button type="button" class="btn btn-success" value="saveData" id="saveData">Next</button>
                </div>
            </div>

            <div id="saveDataField"></div>
        {!! Form::close() !!}
    </div>
    @if (count($errors) > 0)
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    @endif
    <!-- Form#2 -->
    <div class="container">
        {!! Form::open(['url'=>'','id' => 'imageLoader', 'style'=>'display:none', 'enctype'=>'multipart/form-data']) !!}
            <legend>To participate in the conference, please fill out the form</legend>

            <div class="form-group" id="result_form_2" style="display:none"></div>
            {!! Form::label('photo', 'Choose photo:') !!}
            {!! Form::file('image',['class'=>'form-control', 'id'=>'image']) !!}
            <div id="load"></div>

        {!! Form::close() !!}

        {!! Form::open(['url'=>'', 'id' => 'form2', 'style'=>'display:none']) !!}
            <div class="form-group">
                {!! Form::label('company', 'Company:') !!}
                {!! Form::text('company', null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('position', 'Position:') !!}
                {!! Form::text('position', null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('about', 'About me:') !!}
                {!! Form::textarea('about', null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <div class="button-right">
                    <button type="button" class="btn btn-success" value="saveData2" id="saveData2">Next</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <!-- Form#3 -->
    <div class="container">
        <div class="center">
            {!! Form::open(['url'=>'','id' => 'form3', 'style'=>'display:none']) !!}
                <h1>Registration is successfuly complete! Thank you!</h1>
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://127.0.0.1/" data-text="Check out this Meetup with SoCal AngularJS!" data-size="large">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                <div class="g-plus" data-action="share" data-width="300" data-height="24" data-href="http://127.0.0.1" data-text="Check out this Meetup with SoCal AngularJS!"></div>
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2F127.0.0.1&layout=button&size=large&mobile_iframe=true&width=113&height=28&appId" width="113" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            {!! Form::close() !!}
        <div class="center">
    </div>

    <script type="text/javascript">
        $( document ).ready(function() {
            $('#birthday').datepicker({
                language: 'ru',
                minDate: new Date(1990,0,1),
                maxDate: new Date(2010,11,31)
            })
        });
    </script>
    <script>
        function initMap() {
            var uluru = {lat: 34.1011636, lng: -118.3437168};           //lat: 34.1011635, lng: -118.3459049
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map,
                title: '7060 Hollywood Blvd, Los Angeles, CA'
            });
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoa0Z2ih7myb_ucbQq7wy7vB7-k4pQQiY&callback=initMap">
    </script>
@stop