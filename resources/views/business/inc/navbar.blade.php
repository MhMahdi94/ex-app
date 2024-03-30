<!--start header -->
<header>
  <div class=" {{ app()->getLocale() == 'en' ? 'topbar' : 'topbar-rtl' }} d-flex align-items-center">
      <nav class="navbar navbar-expand gap-3">
          <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
          </div>

          


          <div class="top-menu ms-auto">
              <ul class="navbar-nav align-items-center gap-1">
                  <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                      data-bs-target="#SearchModal">
                      <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                      </a>
                  </li>
                  <div class="dropdown mx-4">
                      <a class="nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret "
                          href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <span style="font-size: 14px"> {{ __('routes.Change Language') }} </span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end">
                          @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                              <li>
                                  <a class="dropdown-item d-flex align-items-center" rel="alternate"
                                      hreflang="{{ $localeCode }}"
                                      href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                      {{ $properties['native'] }}
                                  </a>
                              </li>
                          @endforeach
                      </ul>
                  </div>

              </ul>
          </div>
          <div class="user-box dropdown px-3">
              <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{-- <img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar"> --}}
                  <div class="user-info">
                      <p class="user-name mb-0">{{ Auth::guard('business')->user()->name }}</p>
                      <p class="designattion mb-0">{{ Auth::guard('business')->user()->company->name }}</p>
                  </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                  
                  
                  <li><a class="dropdown-item d-flex align-items-center" href="{{ route('business.business.logout') }}"><i
                              class="bx bx-log-out-circle"></i><span>{{ __('routes.Logout') }}</span></a>
                  </li>
              </ul>
          </div>
      </nav>
  </div>
</header>
<!--end header -->
<!-- Left navbar links -->


<!-- Right navbar links -->

</nav>
