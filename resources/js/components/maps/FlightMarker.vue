<script setup>
import PlaneIcon from "@/components/icons/PlaneIcon.vue";

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
