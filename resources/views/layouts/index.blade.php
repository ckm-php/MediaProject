
@if(Auth::user()->image)
<input type="text" name="" id="" value="{{Auth::user()->image}}">

<img class="image rounded-circle" src="{{asset('user_profiles/'.Auth::user()->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
@endif