<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-700 p-6 max-w-xl mx-auto">
    <nav>
        <a href="/">home</a>
        <a href="/about">about</a>
        <a href="/contact">contact</a>
        <a href="/todo">todo</a>
        @guest
        <div class="float-end ">
            <a class="btn btn-primary" href="/register">register</a>
            <a class="btn btn-secondary" href="/login">login</a>
        </div>
        @endguest

        @auth
        <div class="float-end ">
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit" class="btn btn-secondary">logout</button>
            </form>
        </div>
        @endauth

    </nav>

    <main>
        {{$slot}}
    </main>
    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">© 2026 Your Website | All Rights Reserved</p>
    </footer>



</body>

</html>