<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Indo Bali Tour | {{ $blog->title }}</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Typography Enhancements for Reading Experience */
        .article-content {
            font-family: 'Merriweather', 'Georgia', serif;
            font-size: 1.125rem;
            /* 18px */
            line-height: 1.8;
            color: #374151;
            /* gray-700 */
        }

        .article-content p {
            margin-bottom: 1.5rem;
        }

        /* Drop Cap effect on the very first letter of the first paragraph */
        .article-content>p:first-of-type::first-letter {
            float: left;
            font-size: 4.5rem;
            line-height: 0.8;
            padding-top: 0.2rem;
            padding-right: 0.5rem;
            color: #7A0C16;
            font-weight: 900;
            font-family: sans-serif;
        }

        .article-content h2,
        .article-content h3 {
            font-family: 'Inter', sans-serif;
            font-weight: 800;
            color: #111827;
            margin-top: 2.5rem;
            margin-bottom: 1rem;
        }

        .article-content blockquote {
            border-left: 5px solid #7A0C16;
            padding-left: 1.5rem;
            font-style: italic;
            color: #4b5563;
            background: #FDFDFC;
            padding: 1.5rem;
            border-radius: 0 0.5rem 0.5rem 0;
            margin: 2rem 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .article-content img {
            border-radius: 0.75rem;
            margin: 2rem auto;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body class="bg-[#F4F5F7] text-gray-900 antialiased font-sans selection:bg-[#7A0C16] selection:text-white">
    <x-navbar />
    <x-floating_contactUs />

    <!-- Custom Hero for Blog Detail using page-hero -->
    <x-page-hero
        badge="Bali Guide & News"
        badgeIcon="fa-newspaper"
        title=""
        highlight="{{ $blog->title }}"
        subtitle="Published on {{ \Carbon\Carbon::parse($blog->date)->format('d M Y') }} • Read {{ $blog->hit ?? 0 }} times"
        bgImage="{{ asset('images/blogs/' . $blog->img) }}"
        dividerType="hill" />

    <!-- Main Content Area -->
    <div class="max-w-7xl mx-auto px-4 py-12 md:py-20 -mt-20 relative z-30">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <!-- Left Column: Blog Content (Spans 8 cols) -->
            <div class="lg:col-span-8">
                <!-- Main Article Card -->
                <article class="bg-white rounded-3xl shadow-xl overflow-hidden mb-10">

                    <!-- Content Body -->
                    <div class="p-8 md:p-12 lg:p-16">

                        <!-- Category & Date Meta (Mobile Fallback if hero isn't enough) -->
                        <div class="flex items-center gap-4 text-xs font-bold text-gray-400 uppercase tracking-widest mb-8 border-b border-gray-100 pb-4">
                            <span class="text-[#7A0C16] flex items-center gap-2"><i class="fa-solid fa-tag"></i> {{ $blog->category ?? 'News' }}</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-clock"></i> 5 min read</span>
                        </div>

                        <div class="article-content" data-aos="fade-up">
                            {!! $blog->content !!}
                        </div>

                        <!-- Tags (If Available) -->
                        @if($blog->tags)
                        <div class="mt-12 flex flex-wrap gap-2">
                            @foreach(explode(',', $blog->tags) as $tag)
                            <span class="px-4 py-1.5 bg-gray-50 border border-gray-200 text-gray-600 rounded-full text-xs font-semibold hover:bg-[#7A0C16] hover:text-white hover:border-[#7A0C16] transition-colors cursor-pointer">
                                #{{ trim($tag) }}
                            </span>
                            @endforeach
                        </div>
                        @endif

                        <!-- Share Section (Elegant Pill) -->
                        <div class="mt-12 pt-8 border-t border-gray-100 flex flex-col md:flex-row items-center justify-between gap-6" data-aos="fade-up">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Admin+IndoBaliTour&background=7A0C16&color=fff" alt="Admin" class="w-12 h-12 rounded-full shadow-md border-2 border-white">
                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Written by</p>
                                    <p class="text-sm font-extrabold text-gray-900">Admin Indo Bali Tour</p>
                                </div>
                            </div>

                            <div class="flex items-center bg-gray-50 rounded-full p-2 shadow-inner">
                                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider mr-4 ml-3 hidden sm:block">Share:</span>
                                <div class="flex items-center gap-2">
                                    <!-- Facebook -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-white shadow hover:shadow-md text-[#1877F2] flex items-center justify-center transition-all hover:scale-110" title="Share on Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                                    <!-- X / Twitter -->
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-white shadow hover:shadow-md text-black flex items-center justify-center transition-all hover:scale-110" title="Share on X (Twitter)"><i class="fa-brands fa-x-twitter"></i></a>
                                    <!-- WhatsApp -->
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' - ' . request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-[#25D366] shadow hover:shadow-md hover:shadow-green-500/30 text-white flex items-center justify-center transition-all hover:scale-110" title="Share on WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                                    <!-- Telegram -->
                                    <a href="https://t.me/share/url?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-[#229ED9] shadow hover:shadow-md hover:shadow-blue-500/30 text-white flex items-center justify-center transition-all hover:scale-110" title="Share on Telegram"><i class="fa-brands fa-telegram"></i></a>
                                    <!-- Line -->
                                    <a href="https://social-plugins.line.me/lineit/share?url={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-[#00C300] shadow hover:shadow-md hover:shadow-green-500/30 text-white flex items-center justify-center transition-all hover:scale-110" title="Share on LINE"><i class="fa-brands fa-line"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </article>

                <!-- Back Navigation Button -->
                <div class="mb-10 lg:mb-0 text-center md:text-left">
                    <a href="{{ route('blog_event') }}" class="inline-flex items-center justify-center space-x-3 bg-white text-gray-700 px-6 py-3 rounded-xl font-bold shadow-sm hover:shadow-md hover:bg-gray-50 transition-all group">
                        <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
                        <span>Back to All Articles</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: Sidebar (Spans 4 cols) -->
            <div class="lg:col-span-4 space-y-8">

                <!-- Author Bio Card (New Feature) -->
                <div class="bg-white rounded-3xl p-8 shadow-xl text-center border-t-4 border-[#7A0C16]" data-aos="fade-up">
                    <div class="relative inline-block mb-4">
                        <img src="https://images.unsplash.com/photo-1544168190-79c154273140?auto=format&fit=crop&w=150&q=80" alt="Local Expert" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">
                        <span class="absolute bottom-1 right-1 w-5 h-5 bg-green-500 border-2 border-white rounded-full"></span>
                    </div>
                    <h3 class="font-extrabold text-lg text-gray-900 mb-1">Local Bali Expert</h3>
                    <p class="text-xs text-[#7A0C16] font-bold uppercase tracking-widest mb-4">Travel Content Creator</p>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Sharing hidden stories, travel tips, and the authentic culture of the Island of the Gods directly from a local's perspective.
                    </p>
                </div>

                <!-- Recommended Blogs -->
                @if(count($otherBlogs) > 0)
                <div class="bg-white rounded-3xl p-8 shadow-xl" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <div class="w-2 h-6 bg-[#7A0C16] rounded-full"></div>
                        <h3 class="text-base font-extrabold text-gray-900 uppercase tracking-wider">
                            Read Also
                        </h3>
                    </div>

                    <div class="space-y-6">
                        @foreach($otherBlogs as $otherItem)
                        <a href="{{ route('blog.show', $otherItem->slug) }}" class="group flex gap-4 items-center">
                            <div class="w-24 h-24 rounded-2xl overflow-hidden flex-shrink-0 shadow-sm relative">
                                <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors z-10"></div>
                                <img src="{{ asset('images/blogs/' . $otherItem->img) }}" alt="{{ $otherItem->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="flex-1">
                                <span class="text-[10px] font-bold text-[#7A0C16] uppercase tracking-wider mb-1 block">
                                    Tips & Travel
                                </span>
                                <h4 class="text-sm font-bold text-gray-800 group-hover:text-[#7A0C16] transition-colors line-clamp-2 leading-tight">
                                    {{ $otherItem->title }}
                                </h4>
                                <span class="text-[10px] text-gray-400 mt-2 block flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($otherItem->date)->format('d M Y') }}
                                </span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Premium CTA Card -->
                <div class="bg-gradient-to-br from-[#7A0C16] to-[#4A050A] text-white rounded-3xl p-8 shadow-2xl relative overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
                    <!-- BG Decoration -->
                    <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white/5 rounded-full blur-2xl group-hover:bg-white/10 transition-colors duration-500"></div>
                    <div class="absolute right-4 top-4 text-white/10 text-6xl transform rotate-12 group-hover:rotate-0 group-hover:scale-110 transition-all duration-500">
                        <i class="fa-solid fa-umbrella-beach"></i>
                    </div>

                    <div class="relative z-10">
                        <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-[10px] font-bold uppercase tracking-widest mb-4">
                            Special Offer
                        </span>
                        <h3 class="text-2xl font-extrabold mb-3 leading-tight">Make Your Dream Vacation Come True!</h3>
                        <p class="text-sm text-white/80 leading-relaxed mb-8">
                            Don't just read the stories. Contact our team now and get a travel itinerary specially designed for you.
                        </p>

                        <a href="{{ route('contact') }}" class="flex items-center justify-center w-full bg-white text-[#7A0C16] hover:bg-gray-100 hover:shadow-lg hover:-translate-y-1 font-bold py-4 rounded-xl transition-all duration-300 gap-2">
                            Free Consultation <i class="fa-solid fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <x-footer />

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
            offset: 50,
        });
    </script>
</body>

</html>