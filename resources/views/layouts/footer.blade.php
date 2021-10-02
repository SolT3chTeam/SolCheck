<footer class="bg-white border-t border-gray-400 shadow">
    <div class="container max-w-md mx-auto flex py-8">
        <div class="w-full mx-auto flex flex-wrap">
            <div class="flex w-full md:w-1/2 ">
                <div class="px-8">
                    <h3 class="font-bold font-bold text-gray-900">About</h3>
                    <p class="py-4 text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                    </p>
                </div>
            </div>

            <div class="flex w-full md:w-1/2">
                <div class="px-8">
                    <h3 class="font-bold font-bold text-gray-900">Social</h3>
                    <ul class="list-reset items-center text-sm pt-3">
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:underline py-1" href="#">Add social link</a>
                        </li>
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:underline py-1" href="#">Add social link</a>
                        </li>
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:underline py-1" href="#">Add social link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/chart-data.js') }}"></script>
<script src="{{ asset('js/leaflet.js') }}"></script>
<script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var userMenuDiv = document.getElementById("userMenu");
    var userMenu = document.getElementById("userButton");

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) { return true; }
            t = t.parentNode;
        }
        return false;
    }
</script>
@stack('scripts')