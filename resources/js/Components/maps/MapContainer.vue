<script setup>
import { ref } from "vue";
const projection = ref("EPSG:4326");
const zoom = ref(12);
const center = ref([-0.18578166984152553, 51.15573577417759]);
</script>
<template>
    <ol-map style="height: 100%">
        <ol-view
            ref="view"
            :center="center"
            :zoom="zoom"
            :projection="projection"
        />

        <ol-tile-layer>
            <ol-source-osm />
        </ol-tile-layer>

        <slot />
    </ol-map>
</template>
