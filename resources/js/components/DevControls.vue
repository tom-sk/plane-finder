<script setup>
import flightApi from "@/api/flight-api.js";

function rest() {
    flightApi.resetData();
}
</script>

<template>
    <main class="absolute right-0 z-10 p-4">
        <button
            type="button"
            class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
            @click="rest"
        >
            Reset
        </button>
    </main>
</template>
