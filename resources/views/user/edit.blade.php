<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('管理介面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2 p-5">
                <form method="POST" action="{{ route('user.update') }}">
                    @csrf
                    <input hidden name = "id" value = "{{$user->id}}"/>
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('電子郵件')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="phone" :value="__('電話')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$user->phone" required />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    <button class = "mt-2 bg-indigo-600 rounded-md px-2 py-1 text-neutral-100 hover:bg-indigo-500">更新</button>
                </form>
        </div>
    </div>
</x-app-layout>
