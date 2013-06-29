# Hmvc

A Laravel 4 pakage for uses controllers-views in a  architectural Hmvc. 
Reuse your controllers(include module) in multiple views (built in views)

## Installation

Installing Hmvc is simple. First, you can add the package to the `require` attribute of your `composer.json` file.

```json
{
    "require": {
        "papajoker/hmvc": "@master"
    },
}
```

In console run `composer(.phar) update papajoker/hmvc:master`

In console run `php artisan dump autoload`

Add `'Papajoker\Hmvc\HmvcServiceProvider',` to the list of service providers in `/app/config/app.php`



## usage

create your hmvc file in /app/views/

``` <?php // app/view/myrss.hmvc
return array(
	'controller' => 'RssController', 	// your controller in app/controllers/ or package/controller
	'action' => 'index',				// method controller
										// attr pass as parameters in action
	'attr' => array( 					// can overwrite in blade view with @include ('.hmvc',$attr)
		'url' =>    'http://www.planet-php.fr/rss.php',
		'max' => 12
	)
);
``` 

in your blade views :
```@section('content')
	<h4>test a rss built in my page as hmvc</h4>
	<div class="rss" width="45%">
		@include ( 'myrss' , array('max'=>4) )
	</div>
@stop
```

## exemple
 in /exemple you have a small rss

And voila! You can use the Hmvc.


