<html>

<head>
    <meta charset='utf-8' />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/app-BYuY8CgT.css') }}">
    <link href="{{ asset('css/style.css') }}">
    {{-- @vite('resources/css/app.css') --}}
</head>

<body class="text-gray-600 body-font">
<section class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-col px-5 py-24 justify-center items-center">
    <div class="w-full md:w-2/3 flex flex-col mb-16 items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">なんでも慰めてくれるフォーム</h1>
      <form method="POST">
      <div class="flex w-full justify-center items-end flex-col my-3.5">      
      @csrf
        <div class="mx-auto relative lg:w-full xl:w-1/2 w-2/4 md:w-full text-center">
          <textarea rows="5" cols="100" name="sentence" class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-blue-200 focus:bg-transparent border border-gray-300 focus:border-blue-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mx-3.5 my-4">{{ isset($sentence) ? $sentence : '' }}</textarea>
          <button class="mx-auto inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg" type="submit">Button</button>
        </div>
      </div>
      <p class="mb-8 leading-relaxed lg:w-full xl:w-1/2 w-2/4 md:w-full mx-auto">{{ isset($chat_response) ? $chat_response : '' }}</p>
    </form>
    </div>
  </div>
</section>

</body>

</html>