<script setup>
import FlightLine from "@/components/maps/FlightLine.vue";
import FlightMarker from "@/components/maps/FlightMarker.vue";
import { onMounted, onUnmounted, ref } from "vue";
import flightApi from "@/api/flight-api.js";

const props = defineProps({
    id: {
        type: Number,
        default: 0,
    },
});

const linePath = ref([]);
const location = ref();
const position = ref();
const intervalId = ref();

onMounted(() => {
    flightApi.getPosition(props.id).then((res) => {
        position.value = res.data.position ? res.data.position : 0;
        location.value = res.data.location;
        linePath.value = res.data.progress;

        intervalId.value = setInterval(() => {
            position.value = position.value + 1;

            flightApi
                .updatePosition({
                    id: props.id,
                    position: position.value,
                })
                .then((res) => {
                    // set new position to move icon across the map
                    location.value = res.data.location;
                    position.value = res.data.position;
                    // update the line with new progress coords
                    linePath.value = res.data.progress;
                });
        }, 1000);
    });
});

onUnmounted(() => {
    clearInterval(intervalId);
});
</script>

<template>
    <FlightMarker :location="location" />
    <FlightLine :line-path="linePath" />
</template>
