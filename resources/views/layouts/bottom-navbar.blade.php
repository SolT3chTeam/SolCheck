<div class="w-full h-screen">
    <section id="bottom-navigation" class="block fixed inset-x-0 bottom-0 z-10 bg-dark-blue shadow">
        <div id="tabs" class="flex justify-between">
            <a href="{{ url('/more-data') }}" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <span class="tab tab-home block text-l text-orange">How Do You Know?</span>
                <span class="tab tab-home block text-xs text-white">More Supporting Data</span>
            </a>
            <a href="#" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <span class="tab tab-home block text-l text-orange">How to Harvest?</span>
                <span class="tab tab-home block text-xs text-white">Start your Solar Setup Today!</span>
            </a>
            <a href="{{ url('/compare-with-us') }}" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <span class="tab tab-home block text-l text-orange">Compare with Us!</span>
                <span class="tab tab-home block text-xs text-white">Contribute to open solar data</span>
            </a>
            <a href="#" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <span class="tab tab-home block text-l text-orange">FAQs</span>
                <span class="tab tab-home block text-xs text-white">Got more questions?</span>
            </a>
        </div>
    </section>
</div>

<style>
    .text-orange{
        color:#ff914d;
    }

    .bg-dark-blue{
        background-color:#050a30
    }
</style>