<x-public-view>
  <section class="home">
    <div class="home-message">
      {{--<h1>{{ __('Welcome') }}</h1>--}}
      @if ('fr' == App::getLocale())
      <p>« L'art est un support à notre questionnement sur le monde et sur le sens
        de la vie, un chemin de connaissance de soi qui rend capable de s'ouvrir aux
        autres. Sur cette route, je cherche tout en bâtissant. »</p>

      @elseif ('en' == App::getLocale())
      <p>"Art sustains the way we question the world and the meaning of life;
        it unveils the sense of the self, and as such it enables us to open ourselves
        to the other. On this path, while searching, I keep on building."</p>
      @endif

    </div>
    <div class="home-slider">
      <div class="home-slides">
        <div class="home-slide slide fade">
          <img src="{{ asset('/storage/' . $tellina->photos[0]->photo) }}" alt="{{ $tellina->titre }}">
          <a href="/collections/{{ $tellina->collection_id }}/categories/{{ $tellina->categorie_id }}" class="home-slider-details link" onclick="activeArtLinkExtended('{{ $tellina->categorie->id }}', '{{ $tellina->id }}' )">
            {{ $tellina->titre }} - {{ $tellina->date->format('Y') }} - {{ $tellina->collection->titre }} →</a>
        </div>
        @foreach ($oeuvresWelcome as $oeuvre)
        @foreach ($oeuvre->photos as $photo)
        @if ($loop->first)
        <div class="home-slide slide fade">
          <img src="{{ asset('/storage/' . $photo->photo) }}" alt="{{ $oeuvre->titre }}">
          <a href="/collections/{{ $oeuvre->collection_id }}/categories/{{ $oeuvre->categorie_id }}" class="home-slider-details link" onclick="activeArtLinkExtended('{{ $oeuvre->categorie->id }}', '{{ $oeuvre->id }}')">
            {{ $oeuvre->titre }} - {{ $oeuvre->date->format('Y') }} - {{ $oeuvre->collection->titre }} →</a>
        </div>
        @endif
        @endforeach
        @endforeach

        <div class="navigation-manual">
          <span onclick="actualSlide(1)" class="navigation-manual-btn"></span>
          <span onclick="actualSlide(2)" class="navigation-manual-btn"></span>
          <span onclick="actualSlide(3)" class="navigation-manual-btn"></span>
        </div>
      </div>
  </section>

  {{-- <section class="news">
    <div class="news-title">
      <h4> <a href=""> {{ __('Events and exhibitions') }} </a> </h4>
  <a class="news-btn" href="{{ route('actualites.index') }}">{{ __('All') }}</a>
  </div>
  <div class="news-img">
    <img src="{{ asset('/storage/' . $actualite->photo) }}" alt="{{ $actualite->titre }}">
  </div>
  <div class="news-presentation card">
    @if ('en' == App::getLocale() && $actualite->titre_en != null)
    <h2><a href="{{ route('actualites.show', $actualite) }}" class="link"> {{ $actualite->titre_en }} </a></h2>
    <p>{{ $actualite->created_at->format('M d Y') }}</p>
    <p class="body-text">{!! Str::limit($actualite->description_en, 149) !!}</p>
    @else
    <h2><a href="{{ route('actualites.show', $actualite) }}" class="link"> {{ $actualite->titre }} </a></h2>
    <p>{{ $actualite->created_at->format('d M Y') }}</p>
    <p class="body-text">{!! Str::limit($actualite->description, 149) !!}</p>
    @endif
    <h4> <a href="{{ route('actualites.index') }}">{{ __('All the events and exhibitions') }}</a></h4>
  </div>
  </section>

  @include('partialsFront.latestWorksSlide')--}}
  @include('contactMe')


</x-public-view>