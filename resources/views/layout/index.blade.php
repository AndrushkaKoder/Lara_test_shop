<!doctype html>
<html lang="ru">
@include('layout.head')
<body>

<header>
	@include('layout.header')
</header>

<main>
	@yield('content')
</main>

<footer class="container py-5">
	@include('layout.footer')
</footer>

</body>
</html>
