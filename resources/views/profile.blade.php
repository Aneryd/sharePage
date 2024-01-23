<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Профиль</title>
</head>
<body>
    <div>
        <div style="display: flex; justify-content: space-between;">
            <h1>Профиль</h1>

            <form action="{{ route("logout") }}" method="POST">
                @csrf
                <button>Выйти</button>
            </form>
        </div>

        <div>
            <p>ID: {{ $user->id }}</p>
            <p>Имя: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
        </div>
    </div>

    @if(auth()->user())
        @if(auth()->user()->id == $user->id)
            <div>
                <button onclick="generateUrl()">Поделиться страницей</button>
                <div>
                    <p id="secret"></p>
                </div>
            </div>
        @endif
    @endif
</body>

<script>
    function generateUrl(){
        $.ajax({
            url: "/secret",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
            }, success:function(response){
                $("#secret").html(response["secret"])
            }
        })
    }
</script>

</html>