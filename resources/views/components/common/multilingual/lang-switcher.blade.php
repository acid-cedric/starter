@if(multilingual())
    <div class="dropdown{{ ! empty($containerClasses) ? ' ' . implode(' ', $containerClasses) : '' }}">
        <a id="language-selector"
           class="dropdown-toggle{{ ! empty($dropdownLabelClasses) ? ' ' . implode(' ', $dropdownLabelClasses) : '' }}"
           href=""
           title="@lang('Language')"
           data-toggle="dropdown"
           aria-haspopup="true"
           aria-expanded="false">
            <i class="fas fa-language fa-fw"></i>
            @lang('Language')
        </a>
        <div class="dropdown-menu{{ ! empty($dropdownMenuClasses) ? ' ' . implode(' ', $dropdownMenuClasses) : '' }}"
             aria-labelledby="language-selector">
            @foreach(supportedLocales() as $localeKey => $locale)
                <a class="dropdown-item{{ app()->getLocale() === $localeKey ? ' active' : null }} {{ ! empty($dropDownLinkClasses) ? implode(' ', $dropDownLinkClasses) : '' }}"
                   href="{{ Route::localizedUrl($localeKey) }}"
                   title="{{ $locale['name'] }}"
                   rel="alternate"
                   hreflang="{{ $localeKey }}">
                    <i class="fas fa-caret-right fa-fw"></i>
                    @lang($locale['name'])
                </a>
            @endforeach
        </div>
    </div>
@endif
