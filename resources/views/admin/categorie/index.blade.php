<x-app-layout>
  <!-- component -->
  <div>
    <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
      <!-- Loading screen -->
      <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        Loading.....
      </div>

      <div class="flex flex-col flex-1 h-full overflow-hidden">
        <!-- Main content -->
        <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
          <!-- Main content header -->
          <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
            <h1 class="text-2xl font-semibold whitespace-nowrap">Administration des categories</h1>

          </div>


          <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
          <div class="flex justify-between mt-4">
            <h3 class="mt-6 text-xl">Categories</h3>
            <a href="{{ route('admin.categories.create') }}" class="p-2 pl-5 pr-5 bg-transparent border-2 border-green-500 text-green-500 text-lg rounded-lg hover:bg-green-500 hover:text-gray-100 focus:border-4 focus:border-green-300">Créer une nouveau categorie</a>
          </div>
          <div class="flex flex-col mt-6">

            @if(session('success'))
            <span class="block text-red-500">{{ session('success') }}</span>
            @endif
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                  <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-lg font-medium tracking-wider text-left text-gray-500 uppercase">
                          ID
                        </th>
                        <th scope="col" class="px-6 py-3 text-lg font-medium tracking-wider text-left text-gray-500 uppercase">
                          Titre
                        </th>
                        <th scope="col" class="px-6 py-3 text-lg font-medium tracking-wider text-left text-gray-500 uppercase">
                          Photos
                        </th>
                        <th scope="col" class="px-6 py-3 text-lg font-medium tracking-wider text-left text-gray-500 uppercase">
                          Modif
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach ($categories as $categorie)
                      <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                        <td class="px-6 py-4 text-lg text-gray-500 whitespace-nowrap"> {{ $categorie->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="ml-4">
                              <div class="text-lg font-medium text-gray-900"><a href="{{ route('admin.categories.show', $categorie) }}">{{ $categorie->titre }}</a></div>
                              <div class="text-lg text-gray-500">{{ $categorie->created_at->format('d M Y')}}</div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <img class="w-10 h-10 rounded-full" src="{{ asset('/storage/' . $categorie->photo) }}" alt="" />
                        <td class="px-6 py-4 flex justify-start">

                          <a href="{{ route('admin.categories.edit', $categorie) }}" class='bg-yellow-300 hover:bg-yellow-500 px-2 py-2 rounded'><i class="fas fa-edit"></i></a>
                          <a href="#" class="bg-red-500 ml-5 px-2 py-2 rounded hover:bg-red-800" onclick="event.preventDefault(); document.getElementById('form-{{$categorie->id}}').submit();">
                            <i class="fas fa-trash-alt"></i>
                            <form action="{{ route('admin.categories.destroy', ['categorie'=>$categorie->id]) }}" method="post" id='form-{{$categorie->id}}'>
                              @csrf
                              @method('delete')
                            </form>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</x-app-layout>