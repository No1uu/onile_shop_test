@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6">Хэрэглэгчийн Бүртгэлтэй Мэдээллүүд</h1>

        <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200 mb-6">
            <div class="px-4 py-4 sm:px-6 flex justify-between items-center bg-indigo-50">
                <h3 class="text-xl font-bold text-gray-900">
                    {{$detail->firstname}} {{$detail->lastname ?? ''}}
                </h3>
                
                <a href="{{ route('details.edit', ['id' => $detail->id]) }}" type="button"
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                   Өөрчлөх
                </a>
            </div>
            
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="divide-y divide-gray-100">
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Овог, Нэр
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 font-semibold">
                            {{$detail->lastname}} {{$detail->firstname}}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Утасны дугаар
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$detail->phone_number}}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Хаяг
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$detail->address}}, {{$detail->district}}, {{$detail->city}} (Шуудан: {{$detail->postal_code}})
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Тэмдэглэл
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 italic">
                            {{$detail->notes}}
                        </dd>
                    </div>

                </dl>
            </div>
        </div>
    <div class="flex justify-between mt-8">
        <a href="{{ route('home') }}" type="button"
           class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-sm text-white bg-gray-500 hover:bg-gray-600 transition duration-150 ease-in-out">
           Буцах
           
        </a>
    </div>

</div>

@endsection