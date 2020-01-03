@extends('layouts.admin.auth')
@section('content')
    @include('components.common.multilingual.lang-switcher', [
        'containerClasses' => ['text-right'],
        'dropdownLabelClasses' => ['btn', 'btn-link'],
        'dropdownMenuClasses' => ['dropdown-menu-right']
    ])
    @if($icon = $settings->getFirstMedia('icon'))
        <div class="mx-auto mb-4">
            {{ $icon('auth') }}
        </div>
    @endif
    <h1 class="h3 mb-3 font-weight-normal">
        <i class="fas fa-sign-in-alt fa-fw"></i>
        @lang('Sign in area')
    </h1>
    <form method="POST" class="w-100" novalidate action="{{ route('login.login') }}">
        @csrf
        @include('components.common.form.notice')
        {{ inputEmail()->name('email')->componentHtmlAttributes(['autofocus'])->containerHtmlAttributes(['required']) }}
        {{ inputPassword()->name('password')->containerHtmlAttributes(['required']) }}
        {{ inputToggle()->name('remember') }}
        {{ submitValidate()->label(__('Sign me in'))->componentClasses(['btn', 'btn-block', 'btn-primary', 'load-on-click']) }}
        <div class="form-group d-block">
            <a href="{{ route('password.request') }}">
                @lang('Forgotten password')
            </a>
            <a href="{{ route('register') }}" class="float-right">
                @lang('Create account')
            </a>
        </div>
    </form>
    {{ buttonBack()->route('home') }}
@endsection