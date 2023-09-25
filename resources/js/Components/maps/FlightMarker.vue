<script setup>
import PlaneIcon from "@/Components/icons/PlaneIcon.vue";

defineProps({
    location: {
        type: Object,
        default: () => {},
    },
});
</script>

<template>
    <ol-overlay :position="location">
        <PlaneIcon class="overlay-content" />
    </ol-overlay>
</template>
