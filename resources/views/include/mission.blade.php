<!-- Mission and Vision Section -->
<div
    class="bg-[#F8F8F8] rounded-3xl shadow-md py-16 px-6 md:px-10 mt-20 font-[Inter] overflow-hidden opacity-0 animate-fade-up delay-800">
    <!-- Title -->
    <div class="text-center mb-10">
        <h3 class="text-3xl md:text-4xl font-bold text-[#009a66] mb-4">Mission & Vision</h3>
        <div class="max-w-4xl mx-auto text-gray-700 leading-relaxed text-base md:text-lg space-y-6">
            <p>
                We are developing programs to sponsor tournaments that bring like-minded souls together. We are creating
                golf camps to teach the game to those who cannot afford to play. Yes, we have a big agenda. But simply
                stated, there is much to do! We need your help. Though a singular game, a game played within oneself,
                with community there is power to do good and change the world. We are a community of golfers... We are
                one... With many goals!
            </p>

            <p>
                We will provide golf planning assistance to organizations that help underserved and misunderstood people
                in our society, including the military. Join us to learn how you can partner with us to serve your
                community.
            </p>

            <p class="text-center mt-8">
                <a href="{{ route('register') }}" target="_blank"
                    class="inline-block bg-[#009a66] text-white font-semibold px-8 py-3 rounded-full 
                          hover:bg-[#eb9532] transition-all duration-300 shadow-md hover:shadow-lg">
                    Create an account at www.golf4community.com NOW!
                </a>
            </p>
        </div>
    </div>

    <!-- Images Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 max-w-6xl mx-auto">
        <div class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500">
            <img src="{{ asset('mission/mission1.jpg') }}" alt="Golf Community Event"
                class="w-full h-[280px] object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            </div>
        </div>

        <div class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500">
            <img src="{{ asset('mission/mission2.jpg') }}" alt="Golf Training"
                class="w-full h-[280px] object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            </div>
        </div>

        <div class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500">
            <img src="{{ asset('mission/mission3.jpg') }}" alt="Golf Charity"
                class="w-full h-[280px] object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            </div>
        </div>
    </div>
</div>
