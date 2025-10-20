@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px] bg-white">
    
            <form action="{{ route('details.store') }}" method="POST">
            @csrf 
                <div class="mb-5">
                    <label for="lastname" class="mb-3 block text-base font-medium text-[#07074D]">
                        Lastname
                    </label>
                    <input type="text" name="lastname" id="lastname" placeholder="Lastname"
                        value="{{ old('lastname') }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md 
                        {{ $errors->has('lastname') ? 'border-red-500' : '' }}" />
                    @error('lastname')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="firstname" class="mb-3 block text-base font-medium text-[#07074D]">
                        Firstname
                    </label>
                    <input type="text" name="firstname" id="firstname" placeholder="Firstname"
                        value="{{ old('firstname') }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md
                        {{ $errors->has('firstname') ? 'border-red-500' : '' }}" />
                    @error('firstname')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="phone_number" class="mb-3 block text-base font-medium text-[#07074D]">
                        Phone Number
                    </label>
                    <input type="text" name="phone_number" id="phone_number" placeholder="Enter your phone number"
                        value="{{ old('phone_number') }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md
                        {{ $errors->has('phone_number') ? 'border-red-500' : '' }}" />
                    @error('phone_number')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="address" class="mb-3 block text-base font-medium text-[#07074D]">
                        Address
                    </label>
                    {{-- `type="address"` гэсэн HTML төрөл байхгүй тул `type="text"` болгож өөрчлөв --}}
                    <input type="text" name="address" id="address" placeholder="Enter your address"
                        value="{{ old('address') }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md
                        {{ $errors->has('address') ? 'border-red-500' : '' }}" />
                    @error('address')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 pt-3">
                    <label class="mb-5 block text-base font-semibold text-[#07074D] sm:text-xl">
                        Address Details
                    </label>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input type="text" name="city" id="city" placeholder="Enter city"
                                    value="{{ old('city') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md
                                    {{ $errors->has('city') ? 'border-red-500' : '' }}" />
                                @error('city')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input type="text" name="district" id="district" placeholder="Enter district"
                                    value="{{ old('district') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md
                                    {{ $errors->has('district') ? 'border-red-500' : '' }}" />
                                @error('district')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code"
                                    value="{{ old('postal_code') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md
                                    {{ $errors->has('postal_code') ? 'border-red-500' : '' }}" />
                                @error('postal_code')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <textarea name="notes" id="notes" placeholder="Notes"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md
                                    {{ $errors->has('notes') ? 'border-red-500' : '' }}" >{{ old('notes') }}</textarea>
                                @error('notes')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Хадгалах
                    </button>
                </div>
            
            </form>
        </div>
    </div>
@endsection