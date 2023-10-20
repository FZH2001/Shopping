@component('mail::message')
<div style="font-size:30px;color:gray"><b>{{__('Hello')}} {{Auth::user()->name}}!</b></div>
<br>
<br>
<div style="color:rgb(153, 207, 153);font-size:18px">{{__('Please click on the link above to confirm the purchase of the selected products.')}}</div>

@component('mail::button',['url'=>"http://127.0.0.1:8000/buyitems"])
{{__('Buy products')}}
@endcomponent
<div style="color:rgb(153, 207, 153);font-size:18px">{{__('Thank you for your trust.')}}</div>

@endcomponent