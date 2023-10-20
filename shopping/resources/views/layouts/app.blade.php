<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/chosen.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/color-01.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/getting-started/introduction/#js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{-- route('update.cart') --}}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    //url: '{{-- route('remove.from.cart') --}}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{-- route('update.cart') --}}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    //url: '{{-- route('remove.from.cart') --}}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased"  style="font-family: Arial, Helvetica, sans-serif">
    <x-jet-banner />

    <div class=" bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>
<footer style="background-color:black;color:whitesmoke;clear:both">
    <div style="display:flex;justify-content:space-around;align-items:center;padding:2rem;background-color:black;color:whitesmoke">
        <div> 
            <h4 style="font-weight:bold">Policies</h4>
            <ul style="font-weight: 10rem"> <li>Contact us</li>
                <li style="font-weight: 10rem">Privacy & Policy</li>
                <li>Damaged or Defected items</li>
                <li>FAQs</li>
            </ul>

        </div>
        <div> 
            <h4 style="font-weight:bold">Hello polocies</h4>
            <ul >
            <li>Contact us</li>
            <li>Privacy & Policy</li>
            <li>Damaged or Defected items</li>
            <li>FAQs</li>  
            </ul >    
          </div>
        <div> 
            <h4 style="font-weight:bold">Hello polocies</h4>
            <ul style="text-decoration:none;font-weight:1rem" >
            <li >Contact us</li>
            <li>Privacy & Policy</li>
            <li>Damaged or Defected items</li>
            <li>FAQs</li>
            </ul >       
         </div>
        <div> 
            <h3 style="font-weight:bold">suivez-nous</h3>
            <a href="https://instagram.com"><img src="https://cdn-icons-png.flaticon.com/128/733/733558.png" style="display:inline" width="20 rem"></a>
            <a href="instagram.com"><img style="display:inline" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZGVmcz48bGluZWFyR3JhZGllbnQgeDE9Ijg2IiB5MT0iNDMuNjcxODgiIHgyPSI4NiIgeTI9IjEyOS44Mzg1IiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgaWQ9ImNvbG9yLTEiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2ZmZTllNyI+PC9zdG9wPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2RkNmU5NiI+PC9zdG9wPjwvbGluZWFyR3JhZGllbnQ+PGxpbmVhckdyYWRpZW50IHgxPSI4NiIgeTE9IjE0LjEwOTM4IiB4Mj0iODYiIHkyPSIxNTkuNTgzNzUiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiBpZD0iY29sb3ItMiI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmY4MTc3Ij48L3N0b3A+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjYjEyYTViIj48L3N0b3A+PC9saW5lYXJHcmFkaWVudD48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48Zz48cGF0aCBkPSJNNzAuMDQ3LDEyMC45NDU1NmMzMi40NTQyNSwwIDUwLjIwMjUsLTI2Ljg4ODQ0IDUwLjIwMjUsLTUwLjIwMjVjMCwtMC43NjMyNSAtMC4wMTYxMywtMS41MjM4MSAtMC4wNTEwNiwtMi4yODE2OWMzLjQ0NTM4LC0yLjQ5MTMxIDYuNDM5MjUsLTUuNTk4MDYgOC44MDE1NiwtOS4xMzQ4MWMtMy4xNjA1LDEuNDA1NTYgLTYuNTYyODgsMi4zNTE1NiAtMTAuMTMxODgsMi43Nzg4N2MzLjY0MTU2LC0yLjE4NDk0IDYuNDM5MjUsLTUuNjQxMDYgNy43NTg4MSwtOS43NjFjLTMuNDEwNDQsMi4wMjEgLTcuMTgzNjksMy40OTEwNiAtMTEuMjA0MTksNC4yODM4OGMtMy4yMTk2MywtMy40MjkyNSAtNy44MDQ1LC01LjU3Mzg3IC0xMi44Nzg1LC01LjU3Mzg3Yy05Ljc0NDg3LDAgLTE3LjY0NjEyLDcuOTAxMjUgLTE3LjY0NjEyLDE3LjY0MzQ0YzAsMS4zODQwNiAwLjE1NTg4LDIuNzMwNSAwLjQ1Njg4LDQuMDIzMTljLTE0LjY2MywtMC43MzYzNyAtMjcuNjY3ODEsLTcuNzU4ODEgLTM2LjM2NzI1LC0xOC40MzM1NmMtMS41MTU3NSwyLjYwNjg3IC0yLjM4OTE5LDUuNjM1NjkgLTIuMzg5MTksOC44Njg3NWMwLDYuMTIyMTMgMy4xMTQ4MSwxMS41MjY2OSA3Ljg1Mjg3LDE0LjY4NzE5Yy0yLjg5NDQ0LC0wLjA4ODY5IC01LjYxNDE5LC0wLjg4NDE5IC03Ljk5MjYyLC0yLjIwNjQ0Yy0wLjAwMjY5LDAuMDcyNTYgLTAuMDAyNjksMC4xNDc4MSAtMC4wMDI2OSwwLjIyNTc1YzAsOC41NDYyNSA2LjA4MTgxLDE1LjY3ODg3IDE0LjE1NTA2LDE3LjI5Njc1Yy0xLjQ4MDgxLDAuNDAzMTIgLTMuMDQyMjUsMC42MjA4MSAtNC42NTIwNiwwLjYyMDgxYy0xLjEzNjgxLDAgLTIuMjQxMzgsLTAuMTEyODggLTMuMzE2MzgsLTAuMzE3MTNjMi4yNDY3NSw3LjAwOSA4Ljc1ODU2LDEyLjEwOTg4IDE2LjQ4MjQ0LDEyLjI1NWMtNi4wMzg4MSw0LjczMjY5IC0xMy42NDcxMiw3LjU1MTg3IC0yMS45MTM4Nyw3LjU1MTg3Yy0xLjQyNDM3LDAgLTIuODI3MjUsLTAuMDgwNjIgLTQuMjA4NjIsLTAuMjQ0NTZjNy44MDcxOSw0Ljk5ODc1IDE3LjA3OTA2LDcuOTIwMDYgMjcuMDQ0MzEsNy45MjAwNiIgZmlsbD0idXJsKCNjb2xvci0xKSI+PC9wYXRoPjxwYXRoIGQ9Ik04NiwxNTUuODc1Yy0zOC41MzA2OSwwIC02OS44NzUsLTMxLjM0NDMxIC02OS44NzUsLTY5Ljg3NWMwLC0zOC41MzA2OSAzMS4zNDQzMSwtNjkuODc1IDY5Ljg3NSwtNjkuODc1YzM4LjUzMDY5LDAgNjkuODc1LDMxLjM0NDMxIDY5Ljg3NSw2OS44NzVjMCwzOC41MzA2OSAtMzEuMzQ0MzEsNjkuODc1IC02OS44NzUsNjkuODc1ek04NiwyMS41Yy0zNS41NjM2OSwwIC02NC41LDI4LjkzNjMxIC02NC41LDY0LjVjMCwzNS41NjM2OSAyOC45MzYzMSw2NC41IDY0LjUsNjQuNWMzNS41NjM2OSwwIDY0LjUsLTI4LjkzNjMxIDY0LjUsLTY0LjVjMCwtMzUuNTYzNjkgLTI4LjkzNjMxLC02NC41IC02NC41LC02NC41eiIgZmlsbD0idXJsKCNjb2xvci0yKSI+PC9wYXRoPjwvZz48L2c+PC9zdmc+" width="26 rem"></a>
            <a href="instagram.com"><img style="display:inline" src="https://cdn-icons-png.flaticon.com/128/6507/6507576.png" width="20 rem"></a>
            <a href="instagram.com"><img style="display:inline" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZGVmcz48bGluZWFyR3JhZGllbnQgeDE9IjY3LjA5Mzc1IiB5MT0iODcuNzc5ODEiIHgyPSI2Ny4wOTM3NSIgeTI9IjE3My4xNzYwMyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIGlkPSJjb2xvci0xIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiNmZjlmNzAiPjwvc3RvcD48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiM4YjI4YjYiPjwvc3RvcD48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCB4MT0iNjguNDQyNjkiIHkxPSI1NC40NjI0NyIgeDI9IjY4LjQ0MjY5IiB5Mj0iODIuNDIyOTEiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiBpZD0iY29sb3ItMiI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmY5ZjcwIj48L3N0b3A+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjOGIyOGI2Ij48L3N0b3A+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgeDE9IjEzMi4wMTkzMSIgeTE9IjQ5Ljg3ODkxIiB4Mj0iMTMyLjAxOTMxIiB5Mj0iMTc0Ljg4NTE2IiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgaWQ9ImNvbG9yLTMiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2ZmOWY3MCI+PC9zdG9wPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzhiMjhiNiI+PC9zdG9wPjwvbGluZWFyR3JhZGllbnQ+PGxpbmVhckdyYWRpZW50IHgxPSIxMTMiIHkxPSIyMi45NTMxMyIgeDI9IjExMyIgeTI9IjIwMy4wNDY4OCIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIGlkPSJjb2xvci00Ij48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiNmZjUzMDAiPjwvc3RvcD48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiM0NTE0NWEiPjwvc3RvcD48L2xpbmVhckdyYWRpZW50PjwvZGVmcz48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbmUiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwyMjZ2LTIyNmgyMjZ2MjI2eiIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIj48L3BhdGg+PGc+PHBhdGggZD0iTTc3LjY4NzUsMTY5LjV2LTc3LjY4NzVoLTIxLjE4NzV2NzcuNjg3NXoiIGZpbGw9InVybCgjY29sb3ItMSkiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PC9wYXRoPjxwYXRoIGQ9Ik02OC4zNTc5NCw4MS4yMTg3NWM4Ljg3MDUsMCAxNC4zOTMzNywtNS4yMDUwNiAxNC4zOTMzNywtMTIuNTUwMDZjLTAuMTY1OTcsLTcuNTA3NDQgLTUuNTIyODcsLTEyLjg4NTUzIC0xNC4yMjM4NywtMTIuODg1NTNjLTguNzA0NTMsMCAtMTQuMzkzMzcsNS4yMDg1OSAtMTQuMzkzMzcsMTIuNzE2MDNjMCw3LjM0NSA1LjUxOTM0LDEyLjcxOTU2IDE0LjA1NzkxLDEyLjcxOTU2aDAuMTY1OTd6IiBmaWxsPSJ1cmwoI2NvbG9yLTIpIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjwvcGF0aD48cGF0aCBkPSJNOTUuMTUzMDYsMTY5LjVoMjQuOTA5NDR2LTQyLjY4OTI4YzAsLTIuMjg4MjUgMC40MzA4MSwtNC41NzI5NyAxLjEwNTI4LC02LjIwNzk0YzEuODM2MjUsLTQuNTcyOTcgNi42MjgxNiwtOS4zMDQ4NCAxMy42NTUzNCwtOS4zMDQ4NGM5LjIwNTk3LDAgMTMuNDkyOTEsNy4wMjAxMiAxMy40OTI5MSwxNy4zMDY2NnY0MC44OTU0MWgyMS4xODc1di00My44Mjk4N2MwLC0yMy41MDc1MyAtMTAuODkzOTEsLTMzLjUzOTgxIC0yNy42MzU1NiwtMzMuNTM5ODFjLTEzLjcyMjQ0LDAgLTE4LjA5NDEzLDYuNzQ0NjkgLTIxLjQ0MTc1LDEzLjgwNzE5aC0wLjM2Mzcydi0xNC4xMjVoLTI0LjkwOTQ0YzAuMzM1NDcsNy4wNjI1IC0wLjYxNzk3LDc3LjY4NzUgLTAuNjE3OTcsNzcuNjg3NXoiIGZpbGw9InVybCgjY29sb3ItMykiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PC9wYXRoPjxwYXRoIGQ9Ik0xNzYuNTYyNSwyMDEuMjgxMjVoLTEyNy4xMjVjLTEzLjYyNzA5LDAgLTI0LjcxODc1LC0xMS4wOTE2NiAtMjQuNzE4NzUsLTI0LjcxODc1di0xMjcuMTI1YzAsLTEzLjYyNzA5IDExLjA5MTY2LC0yNC43MTg3NSAyNC43MTg3NSwtMjQuNzE4NzVoMTI3LjEyNWMxMy42MjcwOSwwIDI0LjcxODc1LDExLjA5MTY2IDI0LjcxODc1LDI0LjcxODc1djEyNy4xMjVjMCwxMy42MjcwOSAtMTEuMDkxNjYsMjQuNzE4NzUgLTI0LjcxODc1LDI0LjcxODc1ek00OS40Mzc1LDMxLjc4MTI1Yy05LjczNTY2LDAgLTE3LjY1NjI1LDcuOTIwNTkgLTE3LjY1NjI1LDE3LjY1NjI1djEyNy4xMjVjMCw5LjczNTY2IDcuOTIwNTksMTcuNjU2MjUgMTcuNjU2MjUsMTcuNjU2MjVoMTI3LjEyNWM5LjczNTY2LDAgMTcuNjU2MjUsLTcuOTIwNTkgMTcuNjU2MjUsLTE3LjY1NjI1di0xMjcuMTI1YzAsLTkuNzM1NjYgLTcuOTIwNTksLTE3LjY1NjI1IC0xNy42NTYyNSwtMTcuNjU2MjV6IiBmaWxsPSJ1cmwoI2NvbG9yLTQpIiBmaWxsLXJ1bGU9Im5vbnplcm8iPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==" width="24 rem"></a>
            <h5 style="font-weight:bold">Nos Applications</h5>
            <img style="display:inline" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAeFBMVEUAAAD///+goKDZ2dnk5OT09PSZmZnw8PDs7OzExMSNjY0gICD39/fW1tbMzMzn5+evr688PDy3t7eUlJRXV1ednZ21tbVra2t4eHg1NTUaGhpOTk6Dg4NBQUElJSWHh4cuLi5fX18PDw96enpeXl5wcHBISEgqKirlC+ETAAAEh0lEQVR4nO2d2WKiQBBFacQFFE1EMXGJS2Ly/384IWoi0qATq7g9zD3PPtQJTS9V1cTzCCGEEEIIIYQQQgghhBBCCCGEEEIIIYSIM/PDYIkOQo+oZTJ8dBxKrEJz5AEdigqPsTGNNhybMxo4SmcmR4SOR5xxXtDM0AFJE1wImmd0RLL0B5eCBh2SLP2Cn4nRMclSfIJmio5JlMI7+MkjOihJLmfRjB46KElmFkHTQUcliU2wUTOpbYyaMToqQZ6tj/AFHZYgw//zEaKjksT6FjYqgWETbNSGbdn0MWqdZxbooESxCL6iYxJlUhRsWPIiKQiu0SEJU1grGpecifN+3Q06IHFGOcEm5oC7Z36tRp3qT/wYxhN0LDocR+nIb9JpKcd0GKadxs2fTeR9H3X8aTTb3PLj+d4fBt3BoBvEof/kfmq/vw7P58s4qQ55m57/+othtKsp1t+QWFK9Pf+j5NcT62k4W0ccPRE/hyUBm5bl+DD322U/z3CwXPpS6vdFml/e93HlrzMSkEgZ/tWIg+T0fi0erv44o+vSyXhVmC/skmn0moSWulMJ7gzV6OaY/5IW2uxI9Rt4F+05Wi6jpSdozKCP1rNXOyUV0X66TzADXTq11llkGUIFry+DAiDX/m0dgtC6TR1+0DWxhpcQm4/b1iCITYnfthm9iyeo4LrpgrbeNGHAZSlrNVcUdIPG6HqI9xGABRfaggZ9qijLk4kBrw1rC47QglttQ3hpKlUWxGdoesqGb2jBnbJgFy3o7ZUN8T3Rt2Wtfw++RHy97HAX6OyTp35wStF+6us9vplvo2yIr3W/KRui/TzvSVewjfZTLKcdQJ8MP+noGuI3pdrJfAd695W3NA48Q2VDB95D5VHqwKZNu6iG9lOfSx0w1E7ow5M02nsafCZRfV8aogVLrknKgW8xUc8H45v2tA3xd02UG6EcWC8Um/UOgKu/njfVNoQXZrQzwsbswYaWL+gIA89k6LcpoFuga2iHWmEN1aca+Di1XMoWB5yuqcEQ3FCjXH06AN28aR/zDyCf4mMthtAm78qrZ3IAr+xr95t8A0tp1LFeHAhQF/f1N27fhJguPu1+jByQGwnvdRpiBqp259cZoANx8XM6aqB6pOozRF3RV89HnYDtbFZ1GeK+FaJ+vfIA8Cxs/ZqsPMhSVD0LBlBQvZD4BTbrVsdDhArW8SaiE6fqVSh4GUr9/hO+pq+8scHfS9C+erFF+3nKRwzsBxVOaN61dOO7X4q9J658v1VtnDrQaHpEa1F0Y4xmzHUE8RdLflDZgbsxj55QWPcdaG7LIX/XC9/blkf8KhT+kuUlwucot17CA6LtGQ5suC1IzjZOfGuviFz3grOf+pZSfEeLlFPVDNYOk9kqG32byTKt3OeB+72qKSub9qaXN1/XZQnznqPv4Alr52loXb0/rH8OB+5xX2F3OVIHFf/ZMLrMtwau7WSsLM4dwyt1o0V61pgzdCErcxvLcWsUxOPkpgtMm1d/HIZp59/RI4QQQgghhBBCCCGEEEIIIYQQQgghhBAMfwD1hECXH/LfiAAAAABJRU5ErkJggg==" width="40 em"> <b>App store</b>
            <img src="https://cdn.lesnumeriques.com/news/18/188629/cd2a2d50-le-google-play-store-modifie-son-logo-pour-son-10eme-anniversaire.png" width="100 em">

            <ul >
            <li>Contact us</li>
            <li>Privacy & Policy</li>
            <li>Damaged or Defected items</li>
            <li>FAQs</li>
            </ul >
        </div>
    </div>
    <div>
        <hr>
        <div style="text-align: center">Nous acceptons ces moyens de paiement.</div>
        <div style="display:flex;justify-content:center;align-items:center;padding:2rem;background-color:black;color:whitesmoke">

            <div style="margin: 2rem"><img src="https://static.wixstatic.com/media/84770f_27001c40036842889a78a72766ad4700~mv2.png/v1/fill/w_110,h_66,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Visa.png" width="70rem" style="border-radius: 4px"></div>
            <div style="margin: 2rem"><img src="https://static.wixstatic.com/media/c837a6_e8798fcfdaf144478a5c7da1ba28ff2c~mv2.png/v1/fill/w_110,h_68,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/brand-mastercard%403x.png" width="70rem" style="border-radius: 4px"></div>
            <div style="margin: 2rem"><img src="https://static.wixstatic.com/media/84770f_14f105815c3f47bf9001990706915501~mv2.png/v1/fill/w_110,h_70,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Discover.png" width="70rem" style="border-radius: 4px"></div>
            <div style="margin: 2rem"><img src="https://static.wixstatic.com/media/84770f_8445424a46ca49f39359bf19d4a3e537~mv2.png/v1/fill/w_110,h_76,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/PayPal.png" width="70rem" style="border-radius: 4px"></div>
    </div>
    <span>© 2023 par ÉdenTech. Créé avec </span>
</div>

    </div>
</footer>

</div>






</html>
