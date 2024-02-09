<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">2Zal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{Request::route()->getName() == 'website' ? 'active' : ''}}" aria-current="page" href="{{url('/')}}">{{trans('website_navbar_trans.home')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{(Request::route()->getName() == 'getCategories' ? 'active' : '')}}" href="{{route('getCategories')}}">{{trans('website_navbar_trans.category')}}</a>
          </li>

          <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ (trans('website_navbar_trans.Login'))}}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{trans('website_navbar_trans.Register')}}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ trans('website_navbar_trans.Logout')}}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  @if ( Config::get('app.locale')  == 'ar')
                      {{ LaravelLocalization::getCurrentLocaleName() }}
                      <img src="{{asset('assets/flags/iraq.jpg') }}" alt="ar" style="max-width: 20px">
                  @else
                      {{ LaravelLocalization::getCurrentLocaleName() }}
                      <img src="{{asset('assets/flags/amirca.png') }}" alt="en" style="max-width: 20px">
                  @endif
              </button>
              <ul class="dropdown-menu">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                      <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                          {{ $properties['native'] }}
                      </a>
                  @endforeach
              </ul>
          </div>
          </ul>
        

        </ul>

      </div>
    </div>
  </nav>