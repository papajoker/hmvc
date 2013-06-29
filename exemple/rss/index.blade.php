@extends(\Config::get('layout'))
@section('content')
    
    ...

	<h4>test a rss as hmvc</h4>
	@include ('myrss' , array('max'=>4) )

	...

@stop
