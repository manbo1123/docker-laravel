<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='csrf-token' content='{{ csrf_token() }}'>

    <link rel="stylesheet" rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" as="style">
    <link rel="stylesheet" rel="preload" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" as="style">
    <link rel="stylesheet" rel="preload" href="{{ asset('css/app.css') }}" as="style">

    <?php header('X-FRAME-OPTIONS: DENY'); ?>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">        <!-- グーグルフォント -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">    <!-- マテリアルデザインアイコン -->

    <script src="https://cdn.jsdelivr.net/npm/vue2-timepicker@1.1.5/dist/VueTimepicker.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/vue2-timepicker@1.1.5/dist/VueTimepicker.css" rel="stylesheet">

    <title>Amazoneショッピング</title>
    <meta name="description" content="カテゴリ別に商品を探せます。価格比較も可能。">
</head>

<body>
    <div id="app">
        <v-app>
            <header-component 
                :parent-cat='@json($parent_cat)' 
                :coart-count='@json($coart_count ?? 0)'
            ></header-component>

            <v-main class='bg-light'>
                @if (session('flash_message'))
                    <div class="alert alert-danger m-0" role="alert">{{ session('flash_message') }}</div>
                @elseif (session('flash_message_success'))
                    <div class="alert alert-success m-0" role="alert">{{ session('flash_message_success') }}</div>
                @endif

                @yield('content')
            </v-main>
            <scroll-top-btn-component></scroll-top-btn-component>
            <footer-component></footer-component>
        </v-app>
    </div>
    
    <script src='{{ asset("js/app.js") }}'></script>
    @stack('js')
</body>
</html>