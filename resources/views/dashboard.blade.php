<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('管理介面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2 md:grid hidden grid-cols-5 gap-4 p-5">
                <div>使用者名稱</div>
                <div class="col-span-2">電子郵件</div>
                <div>電話</div>
            </div>
            @foreach($users as $user)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2 grid grid-cols-2 md:grid-cols-5 gap-4 p-5">
                <div>{{$user->name}}</div>
                <div  class="col-span-2">{{$user->email}}</div>
                <div><span class = "md:hidden">電話：</span>{{$user->phone}}</div>
                @if(Auth::user() && Auth::user()->role == "admin" || Auth::user()->id == $user->id)             
                    <div>
                        <a href = "{{ route('user.edit',$user->id ) }}" class = "bg-red-500 px-2 py-1 rounded-sm text-neutral-50 hover:opacity-90 active:opacity-80">更新</a>
                        <a href = "#" class = "bg-green-500 px-2 py-1 rounded-sm text-neutral-50 hover:opacity-90 active:opacity-80">刪除</a>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
