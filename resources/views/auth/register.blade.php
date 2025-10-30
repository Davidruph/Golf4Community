@extends('layouts.app')
@section('title', 'Membership Form')

@php
    $inputClass = '
        border-0 border-b border-[#C6C6C6]
        bg-white w-full h-[33.52px]
        focus:border-[#009a66] focus:ring-0 focus:outline-none
        rounded-none transition-colors duration-200 text-[18px]
    ';
@endphp

@section('content')
    <section class="w-full bg-white min-h-screen flex items-center justify-center">
        <div class="p-3 flex flex-col md:flex-row w-full items-center justify-center relative">


            <div class="hidden md:block w-[451px] min-h-screen bg-cover bg-center bg-no-repeat rounded-[20px]"
                style="background-image: url('{{ asset('images/register-bg.svg') }}');">
            </div>

            {{-- Right Form --}}
            <div class="w-full flex flex-col items-center justify-center px-3 md:px-[30px] lg:px-[60px]">
                {{-- Logo --}}
                <div class="flex items-center w-full justify-center mb-8">
                    <a href="{{ route('homepage') }}"><img src="{{ asset('logo.png') }}" alt="Logo" class="w-25"></a>
                </div>

                {{-- Flash messages --}}
                @includeWhen(session('success') || session('error'), 'alerts.alert')


                <p class="auth-subtitle">REGISTER</p>
                <h2 class="auth-title pb-8">BECOME A MEMBER!</h2>

                <div class="flex justify-center mb-12">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-8 h-8 flex items-center justify-center rounded-full 
                    {{ session('step', 1) >= 1 ? 'bg-[#003C05] text-white' : 'bg-[D9D9D9] text-gray-700' }}">
                            1</div>
                        <div class="h-0.5 w-8 bg-[D9D9D9]"></div>
                        <div
                            class="w-8 h-8 flex items-center justify-center rounded-full 
                    {{ session('step', 1) >= 2 ? 'bg-[#003C05] text-white' : 'bg-[D9D9D9] text-gray-700' }}">
                            2</div>
                        <div class="h-0.5 w-8 bg-[D9D9D9]"></div>
                        <div
                            class="w-8 h-8 flex items-center justify-center rounded-full 
                    {{ session('step', 1) >= 3 ? 'bg-[#003C05] text-white' : 'bg-[D9D9D9] text-gray-700' }}">
                            3</div>
                    </div>
                </div>


                <form method="POST" action="{{ route('register.step.submit') }}" class="w-full">
                    @csrf
                    @php $step = session('step', 1); @endphp

                    @if ($step === 1)
                        {{-- First & Last Name --}}
                        <div class="w-full flex flex-col lg:flex-row gap-8 mb-8">
                            <div class="flex flex-col w-full">
                                <label class="auth-label">First Name <span class="label-span">*</span></label>
                                <input type="text" name="first_name"
                                    value="{{ old('first_name', session('form_data.first_name')) }}"
                                    class="{{ $inputClass }}" required>
                                @error('first_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-full">
                                <label class="auth-label">Last Name <span class="label-span">*</span></label>
                                <input type="text" name="last_name"
                                    value="{{ old('last_name', session('form_data.last_name')) }}"
                                    class="{{ $inputClass }}" required>
                                @error('last_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Username & Email --}}
                        <div class="flex flex-col lg:flex-row gap-8 mb-8">
                            <div class="flex flex-col w-full">
                                <label class="auth-label">Username <span class="label-span">*</span></label>
                                <input type="text" name="username"
                                    value="{{ old('username', session('form_data.username')) }}"
                                    class="{{ $inputClass }}" required>
                                @error('username')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-full">
                                <label class="auth-label">Email Address <span class="label-span">*</span></label>
                                <input type="email" name="email" value="{{ old('email', session('form_data.email')) }}"
                                    class="{{ $inputClass }}" required>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Password & Confirm Password --}}
                        <div class="flex flex-col lg:flex-row gap-8 mb-8">
                            {{-- Password --}}
                            <div class="relative flex flex-col w-full">
                                <label class="auth-label">Password <span class="label-span">*</span></label>
                                <input type="password" id="password" name="password" class="{{ $inputClass }} pr-10"
                                    required>
                                <button id="togglePassword" type="button">
                                    <i id="password-icon"
                                        class="fa-solid fa-eye absolute right-2 top-[30px] text-gray-500 cursor-pointer"></i></button>
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="relative flex flex-col w-full">
                                <label class="auth-label">Confirm Password <span class="label-span">*</span></label>
                                <input type="password" id="confirmPassword" name="password_confirmation"
                                    class="{{ $inputClass }} pr-10" required>
                                <button type="button" id="toggleConfirmPassword"><i id="confirm-icon"
                                        class="fa-solid fa-eye absolute right-2 top-[30px] text-gray-500 cursor-pointer"></i></button>
                            </div>
                        </div>
                    @elseif ($step === 2)
                        <div class="flex flex-col lg:flex-row gap-8 mb-8">
                            <div class="flex flex-col w-full">
                                <label class="auth-label">Country <span class="label-span">*</span></label>
                                <select id="country" name="country" class="{{ $inputClass }}" required>
                                    <option value="">Select your country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country', session('form_data.country')) == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-full">
                                <label class="auth-label">State <span class="label-span">*</span></label>
                                <select id="state" name="state" class="{{ $inputClass }}" required>

                                </select>
                                @error('state')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col lg:flex-row gap-8 mb-8">
                            <div class="flex flex-col w-full">
                                <label class="auth-label">City <span class="label-span">*</span></label>
                                <select id="city" name="city" class="{{ $inputClass }}" required>

                                </select>
                                @error('city')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-full">
                                <label class="auth-label">Zip Code <span class="label-span">*</span></label>
                                <input type="text" name="zip" class="{{ $inputClass }}" required>
                                @error('zip')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    @elseif ($step === 3)
                        <div class="flex flex-col lg:flex-row gap-8 mb-8">
                            <div class="flex flex-col w-full">
                                <label class="auth-label">Profession Type <span class="label-span">*</span></label>
                                <select id="profession" name="profession_type" class="{{ $inputClass }}" required>
                                    <option value="">Select your profession type</option>
                                    @foreach ($profession_types as $profession)
                                        <option value="{{ $profession->id }}"
                                            {{ old('profession_type', session('form_data.profession_type')) == $profession->id ? 'selected' : '' }}>
                                            {{ $profession->profession_type }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('profession_type')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-full">
                                <label for="golf_score" class="auth-label">
                                    Golf Score Level <span class="label-span">*</span>
                                </label>
                                <select id="golf_score" name="golf_score" class="{{ $inputClass }}" required>

                                    <option value="" style="display:none;">Select Golf Score Level</option>

                                    @php
                                        $selectedScore = old('golf_score', session('form_data.golf_score'));
                                    @endphp

                                    <option value="Beginner" {{ $selectedScore == 'Beginner' ? 'selected' : '' }}>Beginner
                                    </option>
                                    <option value="62-71" {{ $selectedScore == '62-71' ? 'selected' : '' }}>Score 62-71
                                    </option>
                                    <option value="72-79" {{ $selectedScore == '72-79' ? 'selected' : '' }}>Score 72-79
                                    </option>
                                    <option value="80-87" {{ $selectedScore == '80-87' ? 'selected' : '' }}>Score 80-87
                                    </option>
                                    <option value="88-95" {{ $selectedScore == '88-95' ? 'selected' : '' }}>Score 88-95
                                    </option>
                                    <option value="96-103" {{ $selectedScore == '96-103' ? 'selected' : '' }}>Score 96-103
                                    </option>
                                    <option value="104-Above" {{ $selectedScore == '104-Above' ? 'selected' : '' }}>Score
                                        104 -
                                        Above</option>
                                </select>

                                @error('golf_score')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col lg:flex-row gap-8 mb-8">
                            <div class="flex flex-col w-full">
                                <label class="auth-label">Home Golf Course <span class="label-span">*</span></label>
                                <select id="home_golf_course" name="home_golf_course" class="{{ $inputClass }}"
                                    required>
                                    <option value="">Select your home golf course</option>
                                    @foreach ($golf_courses as $id => $course_name)
                                        <option value="{{ $id }}"
                                            {{ old('home_golf_course', session('form_data.home_golf_course')) == $id ? 'selected' : '' }}>
                                            {{ $course_name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('home_golf_course')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col w-full">
                                <label for="user_type" class="auth-label">
                                    Select User Type <span class="label-span">*</span>
                                </label>
                                <select id="user_type" name="user_type" class="{{ $inputClass }}" required>

                                    <option value="" style="display:none;">Select User Type</option>

                                    @php
                                        $selectedUserType = old('user_type', session('form_data.user_type'));
                                    @endphp

                                    @foreach ($user_types as $user_type)
                                        <option value="{{ $user_type->id }}"
                                            {{ $selectedUserType == $user_type->id ? 'selected' : '' }}>
                                            {{ $user_type->user_type }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('user_type')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6 flex flex-col gap-3">
                            <label class="auth-label">
                                You may contact me to play golf <span class="label-span">*</span>
                            </label>

                            @php
                                $fetch_play = [
                                    'Group of golfer',
                                    'Single Player',
                                    'Only weekends',
                                    'Tournaments',
                                    'Contact me to play golf',
                                    'Mostly during the week',
                                    'Sometimes',
                                ];

                                $selected_play_types = old(
                                    'play_type',
                                    explode(',', session('form_data.play_type', '')),
                                );
                            @endphp

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach ($fetch_play as $play)
                                    <label class="flex items-center space-x-2 cursor-pointer auth-label">
                                        <input type="checkbox" name="play_type[]" value="{{ $play }}"
                                            class="accent-[#003c05] border-gray-300 focus:ring-[#003c05] rounded-full w-4 h-5"
                                            {{ in_array(trim($play), $selected_play_types ?? []) ? 'checked' : '' }}>
                                        <span class="text-sm text-gray-700">{{ $play }}</span>
                                    </label>
                                @endforeach
                            </div>

                            @error('play_type')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full flex gap-3 mb-6 items-center">
                            <input id="agree" type="checkbox" name="agree"
                                class="accent-[#003c05] border-gray-300 focus:ring-[#003c05] rounded-full w-4 h-5"
                                required>
                            <label for="agree" class="aggreement">
                                I agree with the
                                <a data-modal-target="terms-modal" data-modal-toggle="terms-modal"
                                    class="text-[#009a66] hover:underline cursor-pointer">Terms & Conditions</a>
                                and
                                <a data-modal-target="privacy-modal" data-modal-toggle="privacy-modal"
                                    class="text-[#009a66] hover:underline cursor-pointer">Privacy Policy</a>.
                            </label>
                        </div>
                    @endif

                    <div class="text-center mt-6">
                        <p class="auth-question">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-[#009a66] hover:underline font-medium">
                                Login
                            </a>
                        </p>
                    </div>

                    <div class="flex items-center justify-center gap-5 pt-5">
                        @if ($step > 1)
                            <button formaction="{{ route('register.step.prev') }}"
                                class="auth-btn cursor-pointer w-full max-w-[200px] h-[57px] rounded-[10px] flex items-center justify-center bg-[#003C05] text-white transition">
                                PREVIOUS
                            </button>
                        @endif

                        <button
                            class="auth-btn cursor-pointer w-full max-w-[200px] h-[57px] rounded-[10px] flex items-center justify-center bg-[#003C05] text-white transition">
                            {{ $step < 3 ? 'NEXT' : 'SUBMIT' }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>


    <!-- Terms of Service Modal -->
    <div id="terms-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 justify-center items-center w-full h-full bg-black/50">
        <div class="relative p-4 w-full max-w-5xl max-h-[90vh] overflow-y-auto">
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Header -->
                <div class="flex items-center justify-between p-5 border-b border-gray-200">
                    <h3 class="text-2xl font-semibold text-gray-900">Terms of Service</h3>
                    <button type="button" data-modal-hide="terms-modal"
                        class="text-gray-500 hover:text-gray-800 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1l6 6m0 0 6 6M7 7l6-6M7 7L1 13" />
                        </svg>
                    </button>
                </div>

                <!-- Body -->
                <div class="p-6 text-gray-800 text-sm leading-relaxed space-y-6">
                    <p class="text-right text-xs text-gray-500">Last Updated: 09/30/2014</p>

                    <p>
                        <strong>Golf4Community, Inc.</strong> (referred to throughout as “us,” “we,” “our,” etc.) is the
                        owner
                        and operator of the <strong>www.golf4community.com</strong> website, an online golf networking
                        platform for golfers and business organizations.
                        These Terms of Service apply to the website, any subdomains, API integrations, widgets, or related
                        pages
                        we own or operate that link to this statement (collectively, the “Website”).
                    </p>

                    <p>
                        By accessing, using, or registering with the Website, you (“you,” “your,” etc.) agree to be bound by
                        these
                        Terms of Service (“Terms”). If you do not wish to be bound by the Terms, discontinue use
                        immediately.
                    </p>

                    <!-- Section 1 -->
                    <h4 class="font-semibold text-gray-900 text-base mt-6">1. UPDATES TO THE TERMS</h4>
                    <p>
                        <strong>1.0 Updates:</strong> We may update or change these Terms from time to time. Updates apply
                        prospectively and not retroactively. We will indicate the date of the latest revision at the top of
                        this
                        page. You agree to review the Terms periodically for changes.
                    </p>

                    <!-- Section 2 -->
                    <h4 class="font-semibold text-gray-900 text-base mt-6">2. INTELLECTUAL PROPERTY</h4>
                    <p>
                        <strong>2.0 IP Protection:</strong> All Website content and code are owned exclusively by us and
                        protected
                        by intellectual property laws. Your use does not grant any ownership rights.
                    </p>
                    <p>
                        <strong>2.1 Prohibited Activities:</strong> You may not disassemble, reverse engineer, or copy
                        Website
                        source code or materials.
                    </p>
                    <p>
                        <strong>2.2 Your Content:</strong> By uploading or posting content, you grant us a worldwide,
                        royalty-free license to use such content as needed to operate the Website. You warrant that you have
                        the
                        authority to grant this license.
                    </p>

                    <!-- Section 3 -->
                    <h4 class="font-semibold text-gray-900 text-base mt-6">3. GENERAL USER WARRANTIES</h4>
                    <ul class="list-disc pl-5 space-y-1">
                        <li>You have the authority to enter this agreement.</li>
                        <li>Your use of the Website complies with all laws and does not infringe third-party rights.</li>
                        <li>You will provide accurate information and not misrepresent yourself.</li>
                        <li>You are at least 13 years old, and if under 18, have parental consent.</li>
                    </ul>

                    <!-- Section 4 -->
                    <h4 class="font-semibold text-gray-900 text-base mt-6">4. INTERNATIONAL USE</h4>
                    <p>
                        This Website is intended for U.S.-based users. By using it, you confirm compliance with all
                        applicable
                        local laws and consent to your data being processed and stored in the United States.
                    </p>

                    <!-- Section 5 -->
                    <h4 class="font-semibold text-gray-900 text-base mt-6">5. FEES</h4>
                    <p><strong>5.0:</strong> There are no membership fees.</p>
                    <p><strong>5.1 Donations:</strong> We accept donations. Consult your tax advisor for details.</p>

                    <!-- Section 6 -->
                    <h4 class="font-semibold text-gray-900 text-base mt-6">6. ADDITIONAL POLICIES</h4>
                    <p>
                        You also agree to our <a href="#" data-modal-target="privacy-modal"
                            data-modal-toggle="privacy-modal" class="text-blue-600 hover:underline">Privacy Policy</a>.
                    </p>

                    <!-- Section 7 -->
                    <h4 class="font-semibold text-gray-900 text-base mt-6">7. AVAILABILITY</h4>
                    <p>
                        We may discontinue the Website, its services, or your account at any time without notice or
                        liability.
                    </p>

                    <!-- Section 8 -->
                    <h4 class="font-semibold text-gray-900 text-base mt-6">8. LIABILITY</h4>
                    <p><strong>8.0 Waiver of Warranties:</strong> The Website is provided “AS IS” without warranties of any
                        kind.</p>
                    <p><strong>8.1 Taxes:</strong> Consult your tax advisor regarding any deductions.</p>
                    <p>
                        <strong>8.2 Release:</strong> You release us and our affiliates from all liabilities arising from
                        your
                        use of the Website or related events.
                    </p>
                    <p>
                        <strong>8.3 Limitation of Liability:</strong> Our total liability to you will not exceed $100 or the
                        net
                        transaction fees we received in the past 12 months.
                    </p>
                    <p>
                        <strong>8.4 Indemnification:</strong> You agree to indemnify and hold us harmless from any
                        third-party
                        claims arising from your actions.
                    </p>

                    <!-- Section 9 -->
                    <h4 class="font-semibold text-gray-900 text-base mt-6">9. GENERAL</h4>
                    <p><strong>9.0 Governing Law:</strong> Governed by the laws of the State of Georgia, USA.</p>
                    <p><strong>9.1 Forum:</strong> All disputes will be handled in the courts of Stone Mountain, Georgia.
                    </p>
                    <p><strong>9.2 No Joint Venture:</strong> These Terms do not create a partnership or joint venture.</p>
                    <p><strong>9.3 No Assignment:</strong> You may not assign your rights under these Terms.</p>
                    <p><strong>9.4 Entire Agreement:</strong> These Terms represent the full agreement between both parties.
                    </p>
                    <p><strong>9.5 Severability:</strong> Invalid provisions will be replaced by enforceable ones that align
                        with
                        the intent.</p>
                    <p><strong>9.6 No Waiver:</strong> Failure to enforce rights does not waive them.</p>
                    <p><strong>9.7 Survival:</strong> Key sections will survive termination.</p>
                    <p><strong>9.8 Headers:</strong> Section headers are for convenience only.</p>
                    <p><strong>9.9 Attorney’s Fees:</strong> The prevailing party in a dispute may recover legal costs.</p>
                </div>

                <!-- Footer -->
                <div class="flex items-center justify-end gap-3 p-5 border-t border-gray-200">
                    <button data-modal-hide="terms-modal" type="button"
                        class="px-5 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Privacy Policy Modal -->
    <div id="privacy-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 justify-center items-center w-full h-full bg-black/50">
        <div class="relative p-4 w-full max-w-5xl">
            <div class="relative bg-white rounded-lg shadow-sm overflow-y-auto max-h-[90vh]">
                <!-- Header -->
                <div class="flex items-center justify-between p-5 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">Privacy Policy</h3>
                    <button type="button" data-modal-hide="privacy-modal"
                        class="text-gray-500 hover:text-gray-800 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1l6 6m0 0 6 6M7 7l6-6M7 7L1 13" />
                        </svg>
                    </button>
                </div>

                <!-- Body -->
                <div class="p-6 space-y-4 text-gray-700 text-sm leading-relaxed">
                    <h2 class="text-center font-bold text-lg">Golf4Community</h2>

                    <p class="text-center text-gray-500">Last Revised: June 3, 2015</p>

                    <h3 class="font-semibold mt-6">Golf4community Respects your privacy</h3>

                    <p>This Privacy Policy describes how we collect and use the personally identifiable information you
                        provide on our Site and in our mobile applications. It also describes the choices available to you
                        regarding our use of your personally identifiable information and how you can access and update that
                        information.</p>

                    <p>Other than as described in this Policy, we will not give any information about you to others without
                        your express permission.</p>

                    <h3 class="font-semibold mt-6">Information Collection and Use</h3>

                    <p>Our Site and mobile applications use forms in which you give us may contain contact information
                        (including your name, address, telephone number, and email address) so you can place orders, request
                        information and support, and make product suggestions. For certain services, we may also request a
                        credit card number, government identification number, or other financial information. We will then
                        create an account number for you.</p>

                    <p>We receive and store any information you enter on our Site or mobile applications, or give us in any
                        other way, including through email, telephone, or other communications with our customer service
                        department. If you contact us for support, we will keep an internal record of what support was
                        given.</p>

                    <p>We use your information to contact you regarding functionality changes to our products, our Site and
                        mobile applications, new Golf4community services, and special offers we think you'll find valuable.
                        If you would rather not receive this information, please see your website profile section "Updating
                        Your Information" section below on how to change your preferences.</p>

                    <p>We may also use your information to present a co-branded offer with our partners or affiliates. If we
                        collect information from you in connection with a co-branded offer, it will be clear at the point of
                        collection who is collecting the information and whose privacy statement applies.</p>

                    <p>We use information gathered about you from our Site or mobile application statistics (for example,
                        your IP address, location or device operating system) to help personalize search results, diagnose
                        problems with our server, and to administer our Site and mobile applications. We also gather broad
                        demographic information from this data to help us improve our Site and mobile applications and make
                        your browsing and networking experience more enjoyable. This is not linked to any personally
                        identifiable information, except as necessary to prevent fraud or abuse on our system.</p>

                    <p>Our Site and mobile applications use cookies to keep track of your shopping cart and receipts. We use
                        cookies to identify you so you don't need to log in each time you visit our Site or mobile
                        applications. The cookies are linked to your customer number, which is associated with the
                        information in your account.</p>

                    <p>Within our Site and mobile applications we use tracking technologies such as: CI codes (click
                        tracking), ISC (source tracking), and ITC (item tracking codes, attached to purchases at an item
                        level, used to determine where within the application a product was added). Our mobile applications
                        automatically collect the device's operating system, phone model, app version, and device ID, and
                        customer number. We report this data back to our Golf4community web services. These results are not
                        shared with any third parties and are used solely for deciding when to retire SDKs/OS versions and
                        to identify characteristics of major users so that we may optimize our applications and services for
                        those user types.</p>

                    <p>With your express consent, we may access and track location data from your mobile device in order to
                        personalize results such as user favorite domain name selections. We do not tie any personally
                        identifiable information about you to any of the location tracking technologies that we use, and we
                        do not track location data when our mobile applications are not in use. You may withdraw your
                        consent for us to use location data at any time by turning off the location services setting on your
                        device.</p>

                    <p>This Site and our mobile applications contain links to other websites. Unfortunately, Golf4community
                        is not responsible for the privacy practices or the content of such sites.</p>

                    <h3 class="font-semibold mt-6">Security</h3>
                    <p>This Site has security measures in place to protect against the loss, misuse or alteration of the
                        information under our control. When you enter sensitive information (such as a credit card number)
                        on our order forms, we encrypt the transmission of that information using secure socket layer
                        technology (SSL).</p>

                    <p>We follow generally accepted standards to protect the personal information submitted to us, both
                        during transmission and once we receive it. No method of transmission over the Internet, or method
                        of electronic storage, is 100% secure, however. Therefore, we cannot guarantee its absolute
                        security.</p>

                    <h3 class="font-semibold mt-6">Sending Emails</h3>
                    <p>We use emails to communicate with you, to confirm your placed membership, and to send information
                        that you have requested. We also provide email links, as on our "About Golf4community" page, to
                        allow you to contact us directly. We strive to promptly reply to your messages.</p>

                    <p>The information you send to us may be stored and used to improve this Site, our mobile application,
                        and our products, or it may be reviewed and discarded.</p>

                    <h3 class="font-semibold mt-6">Third Party Service Providers</h3>
                    <p>We may at times provide information about you to third parties to provide various services on our
                        behalf, such as processing credit card payments, serving advertisements, conducting contests or
                        surveys, performing analyses of our products or customer demographics, shipping of goods or
                        services, and customer relationship management. We will only share information about you that is
                        necessary for the third party to provide the requested service. These companies are prohibited from
                        retaining, sharing, storing or using your personally identifiable information for any secondary
                        purposes.</p>

                    <h3 class="font-semibold mt-6">Google Analytics</h3>
                    <p>We use a tool called “Google Analytics” to collect information about use of this Site, such as how
                        often users visit the Site, what pages they visit when they do so, and what other sites they used
                        prior to coming to this Site. Google Analytics collects only the IP address assigned to you on the
                        date you visit this Site, rather than your name or other identifying information.</p>

                    <p>Google Analytics plants a permanent cookie on your web browser to identify you as a unique user the
                        next time you visit this Site. This cookie cannot be used by anyone but Google, Inc. The information
                        generated by the cookie will be transmitted to and stored by Google on servers in the United States.
                    </p>

                    <p>We use the information received from Google Analytics only to improve services on this Site. We do
                        not combine the information collected through the use of Google Analytics with personally
                        identifiable information.</p>

                    <p>Google’s ability to use and share information collected by Google Analytics about your visits to this
                        Site is restricted by the Google Privacy Policy. You can prevent Google Analytics from recognizing
                        you on return visits to this Site by disabling the Google Analytics cookie on your browser.</p>

                    <h3 class="font-semibold mt-6">Supplementation of Information</h3>
                    <p>In order to provide certain services to you, we may on occasion supplement the personally
                        identifiable information you submit to us with information from third party sources (e.g.,
                        information from our strategic partners, service providers, or the United States Postal Service). We
                        do this to enhance our ability to serve you, to tailor our products and services to you, and to
                        offer you opportunities to purchase products or services that we believe may be of interest to you.
                    </p>

                    <h3 class="font-semibold mt-6">Contests/Surveys</h3>
                    <p>From time-to-time, we may provide you with the opportunity to participate in contests or surveys. If
                        you choose to participate, we may request certain personally identifiable information from you.
                        Participation in these contests or surveys is completely voluntary and you therefore have a choice
                        whether or not to disclose the requested information. The requested information typically includes
                        contact information (such as name and address), and demographic information (such as zip code and
                        age level - note that you must be 18 or above to enter). We use this information to notify contest
                        winners and award prizes, to monitor site traffic, and to personalize our Site.</p>

                    <p>We may use a third party service provider to conduct these surveys or contests. When we do, that
                        company will be prohibited from using our users' personally identifiable information for any other
                        purpose. We will not share the personally identifiable information you provide through a contest or
                        survey with other third parties unless we give you prior notice and choice.</p>

                    <h3 class="font-semibold mt-6">Targeted Advertisements</h3>
                    <p>Golf4community may display targeted offers to our customers based on the current location by the
                        member. These offers will display as varying product banners. There is no personal or geolocation
                        information collected within these product banners to build a profile about your activities or that
                        is shared with third party advertising companies.</p>

                    <h3 class="font-semibold mt-6">Tell-A-Friend</h3>
                    <p>If a user elects to use our referral service to inform a friend about our Site or mobile application,
                        we ask the user for the friend's name and email address. Golf4community will automatically send the
                        friend a one-time email inviting them to visit our Site. Golf4community stores this information for
                        the sole purpose of sending this one-time email. The friend may contact Golf4community at <a
                            href="mailto:privacy@Golf4community.com"
                            class="text-green-600 underline">privacy@Golf4community.com</a> to request the removal of this
                        information from our database.</p>

                    <h3 class="font-semibold mt-6">What Happens to my Personally Identifiable Information if I Terminate my
                        Golf4community Account?</h3>
                    <p>When your Golf4community account is cancelled (either voluntarily or involuntarily) all of your
                        personally identifiable information is placed in "deactivated" status on our relevant Golf4community
                        databases. However, deactivation of your account does not mean your personally identifiable
                        information has been deleted from our database entirely. We will retain and use your personally
                        identifiable information as necessary in order to comply with our legal obligations, resolve
                        disputes, or enforce our agreements.</p>

                    <h3 class="font-semibold mt-6">Updating Your Information</h3>
                    <ul class="list-decimal pl-5 space-y-1">
                        <li>You may send an email to <a href="mailto:privacy@Golf4community.com"
                                class="text-green-600 underline">privacy@Golf4community.com</a></li>
                        <li>You may visit your online Account</li>
                        <li>You may send mail to Golf4community at the following postal address:<br>
                            <span class="block mt-2">P. O. Box 870971, Stone Mountain, Ga. 30087 USA</span>
                        </li>
                    </ul>

                    <p>We will respond to your request for access or to modify or deactivate your information within thirty
                        (30) days.</p>

                    <h3 class="font-semibold mt-6">Transfer of Data Abroad</h3>
                    <p>If you are visiting this Site from a country other than the country in which our servers are located,
                        your communications with us may result in the transfer of information across international
                        boundaries. By visiting this Site and communicating electronically with us, you consent to such
                        transfers.</p>

                    <h3 class="font-semibold mt-6">Compliance with Laws and Law Enforcement</h3>
                    <p>We cooperate with government and law enforcement officials and private parties to enforce and comply
                        with the law...</p>

                    <p>To the extent we are legally permitted to do so, we will take reasonable steps to notify you in the
                        event that we are required to provide your personal information to third parties as part of legal
                        process.</p>

                    <h3 class="font-semibold mt-6">Changes in Our Practices</h3>
                    <p>We reserve the right to modify this Privacy Policy at any time...</p>

                    <h3 class="font-semibold mt-6">Contacting Our Site</h3>
                    <address class="not-italic space-y-1">
                        <strong>Golf4community</strong><br>
                        ATTN: Website Privacy Team<br>
                        P. O. Box 870971<br>
                        Stone Mountain, Ga. 30087 USA
                    </address>

                    <p class="text-gray-500 mt-4">Revised: 7/4/15</p>
                </div>

                <!-- Footer -->
                <div class="flex items-center justify-end gap-3 p-5 border-t border-gray-200">
                    <button data-modal-hide="privacy-modal" type="button"
                        class="px-5 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
