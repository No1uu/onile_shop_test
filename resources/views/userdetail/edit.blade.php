@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px] bg-white">
            
            <form action="{{ route('details.update', ['id' => $userdetail->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="lastname" class="mb-3 block text-base font-medium text-[#07074D]">
                        Lastname
                    </label>
                    <input type="text" name="lastname" id="lastname" placeholder="Lastname"
                        value="{{ old('lastname', $userdetail->lastname) }}"
                        class="w-full rounded-md border {{ $errors->has('lastname') ? 'border-red-500' : 'border-[#e0e0e0]' }} bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    @error('lastname') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div class="mb-5">
                    <label for="firstname" class="mb-3 block text-base font-medium text-[#07074D]">
                        Firstname
                    </label>
                    <input type="text" name="firstname" id="firstname" placeholder="Firstname"
                        value="{{ old('firstname', $userdetail->firstname) }}"
                        class="w-full rounded-md border {{ $errors->has('firstname') ? 'border-red-500' : 'border-[#e0e0e0]' }} bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    @error('firstname') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div class="mb-5">
                    <label for="phone_number" class="mb-3 block text-base font-medium text-[#07074D]">
                        Phone Number
                    </label>
                    <input type="number" name="phone_number" id="phone_number" placeholder="Enter your phone number"
                        value="{{ old('phone_number', $userdetail->phone_number) }}"
                        class="w-full rounded-md border {{ $errors->has('phone_number') ? 'border-red-500' : 'border-[#e0e0e0]' }} bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    @error('phone_number') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div class="mb-5">
                    <label for="address" class="mb-3 block text-base font-medium text-[#07074D]">
                        Address
                    </label>
                    {{-- type="address" гэж байхгүй тул type="text" болгосон --}}
                    <input type="text" name="address" id="address" placeholder="Enter your address"
                        value="{{ old('address', $userdetail->address) }}"
                        class="w-full rounded-md border {{ $errors->has('address') ? 'border-red-500' : 'border-[#e0e0e0]' }} bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    @error('address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5 pt-3">
                    <label class="mb-5 block text-base font-semibold text-[#07074D] sm:text-xl">
                        Address Details
                    </label>
                    <div class="-mx-3 flex flex-wrap">
                       
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input type="text" name="city" id="city" placeholder="Enter city"
                                    value="{{ old('city', $userdetail->city) }}"
                                    class="w-full rounded-md border {{ $errors->has('city') ? 'border-red-500' : 'border-[#e0e0e0]' }} bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('city') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input type="text" name="district" id="district" placeholder="Enter district"
                                    value="{{ old('district', $userdetail->district) }}"
                                    class="w-full rounded-md border {{ $errors->has('district') ? 'border-red-500' : 'border-[#e0e0e0]' }} bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('district') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input type="number" name="postal_code" id="postal_code" placeholder="Postal Code"
                                    value="{{ old('postal_code', $userdetail->postal_code) }}"
                                    class="w-full rounded-md border {{ $errors->has('postal_code') ? 'border-red-500' : 'border-[#e0e0e0]' }} bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('postal_code') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <textarea name="notes" id="notes" placeholder="Notes"
                                    class="w-full rounded-md border {{ $errors->has('notes') ? 'border-red-500' : 'border-[#e0e0e0]' }} bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ old('notes', $userdetail->notes) }}</textarea>
                                @error('notes') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
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