<script setup>
defineProps({
    linePath: {
        type: Array,
        default: () => [],
    },
    strokeColor: {
        type: String,
        default: () => "red",
    },
    strokeWidth: {
        type: Number,
        default: () => 10,
    },
});
</script>

<template>
    <ol-vector-layer>
        <ol-source-vector>
            <ol-feature>
                <ol-geom-line-string :coordinates="linePath" />
                <ol-style>
                    <ol-style-stroke
                        :color="strokeColor"
                        :width="strokeWidth"
                    />
                </ol-style>
            </ol-feature>
        </ol-source-vector>
    </ol-vector-layer>
</template>

<style scoped></style>
