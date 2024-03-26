<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/storage/img/logo4.png" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/typewriter-effect@2/dist/core.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
</head>
<body>
<h1 id="app" class="text-center bg-dark text-white mb-0"></h1>
  <x-nav/>
  <div class="min-vh-100">
    
    {{$slot}}
    
  </div>
 <x-footer/>
</body>
</html>