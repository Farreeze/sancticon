<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ Auth::user()->email }}
                </div>
            </div>
        </div>
    </div>


    this is the add church form (working already)
                    <div>
                        <form action="{{route('add-church')}}" method="POST">
                            @csrf
                            <input type="hidden" name="main_church" id="" value="0">
                            <input type="hidden" name="sub_church" id="" value="1">
                            <input type="hidden" name="user" id="" value="0">
                            <input type="text" name="church_name" id="" placeholder="church name">
                            <input type="text" name="address" id="" placeholder="church address">
                            <input type="text" name="mobile_number" id="" placeholder="mobile number">
                            <input type="text" name="email" id="" placeholder="email">
                            <input type="text" name="password" id="" placeholder="password">
                            <button type="submit">add church</button>
                        </form>
                    </div>
</x-app-layout>
