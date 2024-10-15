<?php
// Toast Notification
function showToastNotifications()
{
    if (isset($_SESSION['message'])) {
        echo '<div id="toast-success" class="flex items-center max-w-xs p-4 mb-4 text-white bg-green-600 rounded-lg shadow-lg"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-600 bg-green-200 rounded-lg">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">' . $_SESSION['message'] . '</div>
    <button type="button"
        class="close-button ms-auto -mx-1.5 -my-1.5 text-white hover:text-gray-200 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-700"
        aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>';
        unset($_SESSION['message']);
    }

    if (isset($_SESSION['error'])) {
        echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-6 animate-bounce" role="alert">
                <p class="font-bold">Oops!</p>
                <p>' . htmlspecialchars($_SESSION['error']) . '</p>
              </div>';

        unset($_SESSION['error']);
    }

    if (isset($_SESSION['errors']) && is_array($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-6 animate-bounce" role="alert">
            <p class="font-bold">Please correct the following errors:</p>
            <ul class="list-disc list-inside">';
        foreach ($_SESSION['errors'] as $error) {
            echo '<li>' . htmlspecialchars($error) . '</li>';
        }
        echo '</ul></div>';
        unset($_SESSION['errors']);
    }
}
