@extends('main')
@section('title','Login')
@section('container')
<body class="min-h-screen bg-gray-900 flex items-center justify-center p-4">
    <div class="w-full max-w-5xl bg-gray-800 rounded-3xl overflow-hidden card-shadow">
        <div class="flex flex-col md:flex-row">
            <!-- Left Side - Desert Image -->
            <div class="w-full md:w-1/2 relative  min-h-[400px] md:min-h-[600px]">
                <img src="{{asset('images/asset_6.jpeg')}}" class="w-full h-full object-fit "></img>
                <div class="absolute inset-0 bg-black bg-opacity-60"></div>
                <!-- Logo and Back Button -->
                <div class="absolute top-0 left-0 right-0 p-6 flex justify-between items-center">
                    <div class="text-amber-400 text-2xl font-bold ">SMEGRIMA HOTEL</div>
                    <a href="{{route('home')}}" class="text-white bg-gray-400/10 px-4 py-2 rounded-lg text-sm hover:bg-amber-400/20 transition-colors">
                        Back to website →
                    </a>
                </div>

                <!-- Desert Illustration Text -->
                <div class="absolute bottom-0 left-0 p-8">
                    <h2 class="text-white text-3xl font-bold mb-4">
                        Capturing Moments,<br/>
                        Creating Memories
                    </h2>
                    <div class="flex space-x-2">
                        <div class="w-8 h-1 bg-white rounded-full"></div>
                        <div class="w-2 h-1 bg-white/50 rounded-full"></div>
                        <div class="w-2 h-1 bg-white/50 rounded-full"></div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Sign Up Form -->
            <div class="w-full md:w-1/2 p-8 md:p-12 bg-gray-800">
                <div class="max-w-md mx-auto">
                    <h1 class="text-white text-3xl font-bold mb-2">Log in an account</h1>
                    <p class="text-white mb-8">
                        Dont have an account?
                        <a href="{{route('register')}}" class="text-amber-500 hover:text-amber-400">Register</a>
                    </p>

                    <form method="POST" action="{{route('login.prs')}}" class="space-y-4">
                        @csrf
                        <div class="flex gap-4">
                            {{-- <div class="flex-1">
                                <input type="text"
                                       placeholder="Name"
                                       class="w-full px-4 py-3 rounded-lg input-bg border border-white text-white placeholder-white focus:outline-none focus:border-white"/>
                            </div> --}}
                            {{-- <div class="flex-1">
                                <input type="text"
                                       placeholder="Last name"
                                       class="w-full px-4 py-3 rounded-lg input-bg border border-white text-white placeholder-white focus:outline-none focus:border-white"/>
                            </div> --}}
                        </div>

                        <input type="email"
                               placeholder="Email"
                               name="email"
                               class="w-full px-4 py-3 rounded-lg input-bg border border-white text-white placeholder-white focus:outline-none focus:border-white"/>

                        <div class="relative">
                            <input type="password"
                                   placeholder="Enter your password"
                                   name="password"
                                   class="w-full px-4 py-3 rounded-lg input-bg border border-white text-white placeholder-white focus:outline-none focus:border-white"/>
                            {{-- <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-white">
                                👁
                            </button> --}}
                        </div>

                        {{-- <div class="flex items-center space-x-2">
                            <input type="checkbox"
                                   class="w-4 h-4 rounded border-amber-500 text-amber-600 focus:ring-amber-500"/>
                            <label class="text-amber-300 text-sm">
                                I agree to the
                                <a href="#" class="text-amber-400 hover:text-amber-500">Terms & Conditions</a>
                            </label>
                        </div> --}}

                        <button type="submit"
                                class="w-full py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors">
                            Log in
                        </button>

                        {{-- <div class="text-center text-amber-300 text-sm">Or register with</div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
@push('css')
<style>
    .desert-bg {
        background: linear-gradient(180deg, #D97706 0%, #92400E 100%);
    }
    .card-shadow {
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }
    .input-bg {
        background: rgba(255, 193, 7, 0.05);
    }
</style>
@endpush
