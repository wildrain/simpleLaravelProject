<!doctype html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<title>Hello world project</title>
</head>

<body>
	
	<h1>List of Names</h1>
	<a href="/names/create">Add a new name</a>
	<ul>
		@foreach($folks as $person)
			<li><a href="/names/show/{{$person->id}}">{{$person->name}}</a> </li>
		@endforeach
	</ul>


</body>
</html>