<section class="slider">
  <div class="slider-wrap">
    <div class="slider-content">
      <div class="slider-title">
        <div class="title">{{ __('Latest works') }}</div>
        <p class="body-text intro">Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta.</p>
      </div>
      <div class="slider-arts item">
        @foreach ($oeuvres as $oeuvre)
        @foreach ($oeuvre->photos as $photo)
        @if ($photo->position === 0)
        <div class="slide-2 card">
          <div>
            <a href="/collections/{{ $oeuvre->collection_id }}/categories/{{ $oeuvre->categorie_id }}/" onclick="activeArtLinkExtended('{{ $oeuvre->categorie->id }}', '{{ $oeuvre->id }}')">
              <img src="{{ asset('/storage/' . $photo->photo) }}" alt="{{ $oeuvre->categorie->titre }}">
              <div class="cross">
                <span></span>
                <span></span>
              </div>
            </a>
          </div>
          @if ('en' == App::getLocale())
          <p>{{ $oeuvre->date->format('M d Y') }}</p>
          @else
          <p>{{ $oeuvre->date->locale('fr_FR')->isoFormat('ll') }}</p>
          @endif
          <p><a class="link" href="/collections/{{ $oeuvre->collection->id }}/categories/{{ $oeuvre->categorie->id }}/">
              {{ $oeuvre->categorie->titre }}
            </a></p>
          <h3>
            <a href="/collections/{{ $oeuvre->collection_id }}/categories/{{ $oeuvre->categorie_id }}" onclick="activeArtLinkExtended('{{ $oeuvre->categorie->id }}', '{{ $oeuvre->id }}')" class="link">
              {{ $oeuvre->titre }}</a>
          </h3>
          <p class="body-text">{{ Str::limit($oeuvre->description, 120) }}</p>
        </div>
        @endif
        @endforeach
        @endforeach
      </div>
    </div>
  </div>
</section>