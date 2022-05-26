<x-app-layout>
    <div class="container w-full mx-auto lg:w-3/5">
        <h1 class="text-3xl font-semibold text-center">Welcome {{ auth()->user()->display_name }}</h1>

        <div class="my-5">
            <h2 class="text-xl font-semibold text-center">Announcements</h2>

            <a href="#" class="text-blue-500">View All</a>
            <a href="#" class="text-green-500">Create New</a>

            <div class="p-4">
                <div class="p-3 my-2 border-2 border-gray-900">
                    <div class="flex">
                        <div class="my-auto mr-2 border-r-2 border-gray-900">
                            <p class="text-sm font-bold uppercase text-slate-500"
                                style="writing-mode: vertical-lr; text-orientation: upright;">New Member</p>
                        </div>
                        <div>
                            <p class="text-lg text-white">Test Annoucement</p>
                            <p class="text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae
                                consectetur impedit, dolorem numquam nostrum iusto laudantium ad id assumenda architecto
                                nam voluptates animi dolorum eveniet at. Praesentium incidunt reiciendis in!
                                Laboriosam sequi exercitationem natus error voluptates ipsam quam dolore ut fugit quod?
                                Molestias ut ad nihil, nulla vitae excepturi placeat provident minus voluptas? Animi
                                consequatur at blanditiis labore asperiores. Ab?</p>
                        </div>
                    </div>
                    <p class="text-right text-gray-600">Posted by: Admin at
                        05/25/2022 20:00
                    </p>
                </div>
                <p class="text-white">Showing 3 of 6. View all <a href="#" class="link-blue">here</a>.</p>
            </div>

        </div>

        <div class="my-5">
            <h2 class="text-xl font-semibold text-center">Quick Links</h2>
        </div>
    </div>

</x-app-layout>
