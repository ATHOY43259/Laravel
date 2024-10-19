<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
    @layer utilities {
      .container{
        @apply px-10 mx-auto;

      }
    }
  </style>
    <title>Document</title>
</head>
<body>
    <div class = "container">
        <div class="flex justify-between my-5">
        <h1 class="text-red-500 text-xl" >Home</h1>

        <a href="/create" class="big bg-green-600 text-white rounded py-2 px-4" >Add New Post</a>
        </div>
            @if (session('Success'))
                <h2 class="text-green-600">{{ session('Success')}}</h2>
            @endif
            <div class="div">
            <div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 border border-green-300 my-5" >
          <thead class="bg-green-600">
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">Id</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">Name</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">Description</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-white uppercase">Image</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-white uppercase">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">

            @foreach ($posts as $post )
              <tr class="hover:bg-gray-100">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$post->id}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$post->name}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$post->description}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><img src="images/{{$post->image}}" width="40px" alt=""></td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                <a href="{{route('edit', $post->id)}}" class = " bg-green-600 text-white rounded py-2 px-4" >Edit</a>
                <a href="{{route('delete', $post->id)}}" class = "bg-red-600 text-white rounded py-2 px-4" >Delete</a>
              </td>
            </tr>
            @endforeach

            

            

           
          </tbody>
        </table>
        {{$posts->links()}}
      </div>
    </div>
  </div>
</div>
            </div> 

                
            
        </div>

    
    </div>
</body>
</html>