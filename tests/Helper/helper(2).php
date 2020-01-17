<?php
/*
The asset function generates a URL for an asset using the current scheme of the request (HTTP or HTTPS):
*/
$url = asset('img/photo.jpg');

/*
The secure_asset function generates a URL for an asset using HTTPS:
*/
$url = secure_asset('img/photo.jpg');

/*
The route function generates a URL for the given named route:
*/
$url = route('routeName');
$url = route('routeName', ['id' => 1]);

/*
By default, the route function generates an absolute URL. If you wish to generate a relative URL, you may pass false as the third argument:
*/

$url = route('routeName', ['id' => 1], false);

/*
The secure_url function generates a fully qualified HTTPS URL to the given path:
*/
$url = secure_url('user/profile');

$url = secure_url('user/profile', [1]);

/*
The url function generates a fully qualified URL to the given path:
*/
$url = url('user/profile');

$url = url('user/profile', [1]);

/*
If no path is provided, a Illuminate\Routing\UrlGenerator instance is returned:
*/
$current = url()->current();

$full = url()->full();

$previous = url()->previous();

/*
The app function returns the service container instance:
*/
$container = app();

/*
You may pass a class or interface name to resolve it from the container:
*/
$api = app('HelpSpot\API');

/*
The broadcast function broadcasts the given event to its listeners:
*/
broadcast(new UserRegistered($user));

/*
The blank function returns whether the given value is "blank":
*/
blank('');
blank('   ');
blank(null);
blank(collect());

// true

blank(0);
blank(true);
blank(false);

// false

/*
The class_uses_recursive function returns all traits used by a class, including traits used by all of its parent classes:
*/
$traits = class_uses_recursive(App\User::class);

/*
The config function gets the value of a configuration variable. The configuration values may be accessed using "dot" syntax, which includes the name of the file and the option you wish to access. A default value may be specified and is returned if the configuration option does not exist:
*/
$value = config('app.timezone');

$value = config('app.timezone', $default);

/*
You may set configuration variables at runtime by passing an array of key / value pairs:
*/
config(['app.debug' => true]);

/*
The dispatch function pushes the given job onto the Laravel job queue:
*/
dispatch(new App\Jobs\SendEmails);

/*
The dispatch_now function runs the given job immediately and returns the value from its handle method:
*/
$result = dispatch_now(new App\Jobs\SendEmails);

/*
The env function retrieves the value of an environment variable or returns a default value:
*/
$env = env('APP_ENV');

// Returns 'production' if APP_ENV is not set...
$env = env('APP_ENV', 'production');

/*
The event function dispatches the given event to its listeners:
*/
event(new UserRegistered($user));

/*
The optional function accepts any argument and allows you to access properties on that object. If the given object is null, accessing a property will return null instead of causing an error:
*/
return optional($user->address)->street;

{!! old('name', optional($user)->name) !!}

/*
If the method you want to call is not actually on the object itself, you can pass a Closure to optional as its second argument:
*/
return optional(User::find($id), function ($user) {
    return TwitterApi::findUser($user->twitter_id);
});

/*
The tap function accepts two arguments: an arbitrary $value and a Closure. The $value will be passed to the Closure and then be returned by the tap function. The return value of the Closure is irrelevant:
*/
$user = tap(User::first(), function ($user) {
    $user->name = 'taylor';

    $user->save();
});

/*
The with function returns the value it is given. If a Closure is passed as the second argument to the function, the Closure will be executed and its result will be returned:
*/
$callback = function ($value) {
    return (is_numeric($value)) ? $value * 2 : 0;
};

$result = with(5, $callback);

// 10

$result = with(null, $callback);

// 0

$result = with(5, null);

// 5

?>