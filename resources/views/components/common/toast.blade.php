<div class="flex justify-center" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
    <div id="toast-simple"
        class="flex items-center mt-4 w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
        role="alert">
        {{$slot}}
    </div>
</div>