<x-app-layout>
  <!-- component -->
  <div>
    <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
      <!-- Loading screen -->
      <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        {{ __('Loading') }}.....
      </div>

      <div class="flex flex-col flex-1 h-full overflow-hidden">
        <!-- Main content -->
        <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
          <!-- Main content header -->
          <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
            <h1 class="text-2xl font-semibold whitespace-nowrap">{{ __('Edit') }} "{{ $oeuvre->titre }}"</h1>
          </div>

          <div class="mt-6 px-6 edit">
            <div class="my-5">
              @foreach ($errors->all() as $error)
              <span class="block text-red-500"> {{ $error }} </span>
              @endforeach
            </div>

            <form action="{{ route('admin.oeuvres.update', $oeuvre) }}" method="post" enctype="multipart/form-data">
              @method('put')

              @csrf

              <div class="mt-5 mb-8 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                  <div class="mb-5 px-4 py-5 bg-white space-y-6 sm:p-6">

                    <x-success class="mb-6" />

                    <div class="grid grid-cols-3 gap-6">
                      <div class="col-span-3 sm:col-span-2">
                        <label for="titre" class="block text-lg font-medium text-gray-700">
                          {{ __('Title') }}
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <input type="text" name="titre" id="titre" class="focus:ring-[#92d6d6] focus:border-[#92d6d6] flex-1 block w-full rounded-md sm:text-lg border-gray-300" value="{{ $oeuvre->titre }}">
                        </div>
                      </div>
                    </div>

                    <div class=" grid grid-cols-3 gap-6">
                      <div class="col-span-3 sm:col-span-2">
                        <label for="sous_titre" class="block text-lg font-medium text-gray-700">
                          {{ __('Subtitle') }}
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <input type="text" name="sous_titre" id="sous_titre" class="focus:ring-[#92d6d6] focus:border-[#92d6d6] flex-1 block w-full rounded-md sm:text-lg border-gray-300" value="{{ $oeuvre->sous_titre }}">
                        </div>
                      </div>
                    </div>

                    <div>
                      <label for=" description" class="block text-lg font-medium text-gray-700">
                        {{ __('Description') }}
                      </label>
                      <div class="mt-1">
                        <textarea id="description" name="description" rows="3" class="px-1.5 py-1.5 shadow-sm focus:ring-[#92d6d6] focus:border-[#92d6d6] mt-1 block w-full sm:text-lg border border-gray-300 rounded-md" placeholder="{{__('Description of the artwork')}}">{{ $oeuvre->description }}</textarea>
                      </div>
                    </div>

                    <div>
                      <label for="date" class="block text-lg font-medium text-gray-700">
                        {{ __('Date de creation') }}
                      </label>
                      <div class="mt-1">
                        <input type="date" name="date" id="date" value="{{ $oeuvre->date->format('Y-m-d') }}" class="focus:ring-[#92d6d6] focus:border-[#92d6d6] flex-1 block w-full rounded-md sm:text-lg border-gray-300">
                      </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="collection" class="block text-lg font-medium text-gray-700">{{ __('Collection') }}</label>
                      <select id="collection" name="collection" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-[#92d6d6] focus:border-[#92d6d6] sm:text-lg">
                        @foreach ($collections as $collection)
                        <option value="{{ $collection->id }}" {{ $oeuvre->collection_id === $collection->id ? 'selected' : '' }}>{{ $collection->titre }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="categorie" class="block text-lg font-medium text-gray-700">{{ __('Categorie') }}</label>
                      <select id="categorie" name="categorie" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-[#92d6d6] focus:border-[#92d6d6] sm:text-lg">
                        @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $oeuvre->categorie_id === $categorie->id ? 'selected' : '' }}>{{ $categorie->titre }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div>
                      <label class="block text-lg font-medium text-gray-700">
                        {{ __('Photo') }}
                      </label>
                      <div class="container grid grid-cols-3 gap-2 mx-auto">
                        @foreach ($oeuvre->photos as $photo)
                        <div class="w-full rounded flex flex-col items-end">
                          <label>
                            <input id="checkInput" type="checkbox" name="delete-{{$photo->id}}" value="delete-{{$photo->id}}">
                            <div class="bg-red-500 px-2 py-2 rounded hover:bg-red-800 trash"><i class="fas fa-trash-alt"></i></div>
                          </label>
                          <img src="{{ asset('/storage/' . $photo->photo) }}" alt="image">
                          <label for="categorie" class="block text-lg font-medium text-gray-700">{{ __('Select the order for your photos') }}</label>
                          <select name="position-{{$photo->id}}" id="position" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-[#92d6d6] focus:border-[#92d6d6] sm:text-lg">
                            @for($i = 1; $i <= count($oeuvre->photos); $i++)
                              @if ($i === $photo->position +1)
                              <option selected value="{{$i-1}}">{{$i}}</option>
                              @else
                              <option value="{{$i-1}}">{{$i}}</option>
                              @endif
                              @endfor
                          </select>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    {{--
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                          <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                          <div class="flex text-lg text-gray-600">
                            <label for="photos" class="relative cursor-pointer bg-white rounded-md font-medium text-[#92d6d6] hover:text-[#92d6d6] focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-[#92d6d6]">
                              <span>{{ __('Upload a photo') }}</span>
                    <input multiple id="photos" name="photos[]" type="file" class="sr-only">
                    </label>
                    <p class="pl-1">{{ __('or drag and drop') }}</p>
                  </div>
                  <div class="col-md-12">
                    <div class="mt-1 text-center ">
                      <div class="preview-image grid grid-cols-4 gap-4"> </div>
                    </div>
                  </div>
                </div>
              </div>
              --}}

              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input id="active" name="active" type="checkbox" class="focus:ring-[#92d6d6] h-4 w-4 text-[#92d6d6] border-gray-300 rounded" {{$oeuvre->active ? 'checked' : '' }}>
                </div>
                <div class="ml-3 text-lg">
                  <label for="active" class="font-medium text-gray-700">{{__('If checked, the artwork will be visible to everyone')}}.</label>
                </div>
              </div>

              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-[#92d6d6] hover:bg-[#08a398] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#92d6d6]">
                  {{ __('EDIT AN ART OBJECT') }}
                </button>
              </div>
          </div>
      </div>
    </div>
    </form>
  </div>
  </main>
  </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script type="text/javascript">
    $(function() {
      // Multiple images preview with JavaScript
      var previewImages = function(input, imgPreviewPlaceholder) {
        if (input.files) {
          var filesAmount = input.files.length;
          for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
              $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
            }
            reader.readAsDataURL(input.files[i]);
          }
        }
      };

      $('#photos').on('change', function() {
        previewImages(this, 'div.preview-image');
      });
    });
  </script>
</x-app-layout>