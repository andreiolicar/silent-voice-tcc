<x-app-layout>
    <x-slot:title>Minha conta</x-slot:title>
    <x-slot:header>
        <h1 class="page-title">{{ __('Profile') }}</h1>
    </x-slot:header>

    <div class="grid max-w-3xl gap-5">
        <section class="panel p-6 sm:p-8">
            @include('profile.partials.update-profile-information-form')
        </section>
        <section class="panel p-6 sm:p-8">
            @include('profile.partials.update-password-form')
        </section>
        <section class="panel p-6 sm:p-8">
            @include('profile.partials.delete-user-form')
        </section>
    </div>
</x-app-layout>
