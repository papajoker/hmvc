<div style="width:40%" class="rss">

@foreach( $messages as $item)
	<?php $i++; if ($i>$max) continue; ?>
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h5 style="margin:0">{{$item->title}}</h5>
	<a href="{{ $item->link }}" target="rss">go</a> &nbsp;
</div>
@endforeach

</div>

