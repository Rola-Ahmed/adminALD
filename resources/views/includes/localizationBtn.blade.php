<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            {{-- {{ app()->getLocale() .''. App::currentLocale() }} --}}

            {{ __('translation.' . app()->getLocale()) }}


            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('lang.switch', 'en') }}">{{ __('translation.en') }}</a></li>
            <li><a href="{{ route('lang.switch', 'ar') }}">@lang('translation.ar')</a></li>
        </ul>
    </li>
</ul>
