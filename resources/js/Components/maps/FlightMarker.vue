<script setup>
import PlaneIcon from "@/Components/icons/PlaneIcon.vue";

defineProps({
    position: {
        type: Object,
        default: () => {},
    },
});
</script>

<template>
    <ol-overlay :position="position">
        <PlaneIcon class="overlay-content" />
    </ol-overlay>
</template>
