<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{env('APP_NAME') .' || '. $data['seo_title']}}</title>
  <meta name="description" content="{{$data['seo_description']}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
  @include('front.layouts.header')
  @yield('content')
</body>
</html>