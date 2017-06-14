@extends('app')

@section('content')

    <h1>All members</h1>
    <p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td style='display:none'><b></b></td>
                <td><b>Photo</b></td>
                <td><b>Name and Surname</b></td>
                <td><b>Report Subject</b></td>
                <td><b>Email</b></td>
                @if (Auth::guest())
                    <!--something -->
                @else
                    <td><b>Show/Hide</b></td>
                @endif
            </tr>
            @foreach($members as $member)
                <tr>
                    @if (Auth::guest())
                        @if($member->visibility == 1)
                            @if($member->photo == null)
                                <td><img src ='images/unknown.jpg' alt = '#' width = '75px'></td>
                            @else
                                <td><img src ='/storage/app/{{$member->photo}}' alt = '#' width = '75px'></td>
                            @endif
                            <td>{{$member->firstname}} {{$member->lastname}}</td>
                            <td>{{$member->report}}</td>
                            <td><a href='mailto:{{$member->email}}'>{{$member->email}}</a></td>
                        @endif
                    @else
                        <td style='display:none'>{{$member->id}}</td>
                        @if($member->photo == null)
                            <td><img src ='images/unknown.jpg' alt = '#' width = '75px'></td>
                        @else
                            <td><img src ='/storage/app/{{$member->photo}}' alt = '#' width = '75px'></td>
                        @endif
                        <td>{{$member->firstname}} {{$member->lastname}}</td>
                        <td>{{$member->report}}</td>
                        <td><a href='mailto:{{$member->email}}'>{{$member->email}}</a></td>
                        <td>
                            @if ($member->visibility == 1)
                                <input type="checkbox" id = "cBox{{$member->id}}" value="{{$member->id}}" checked="checked" class="setVisibility">
                            @else
                                <input type="checkbox" id = "cBox{{$member->id}}" value="{{$member->id}}" class="setVisibility">
                            @endif
                        </td>
                    @endif

                </tr>
            @endforeach

        </table>
    </div>
    </p>

@stop