<script setup>
import flightApi from "@/api/flight-api.js";
import { onMounted, onUnmounted, ref } from "vue";
import MapContainer from "@/Components/maps/MapContainer.vue";
import FlightPath from "@/Components/maps/FlightPath.vue";

const location = ref();
const position = ref();

const linePath = ref([]);

const intervalId1 = null;
const intervalId2 = null;

// onMounted(() => {
//     flightApi.getPosition(1).then((res) => {
//         position.value = res.data.position ? res.data.position : 0;
//         location.value = res.data.location;
//         linePath.value = res.data.progress;
//
//         intervalId1 = setInterval(() => {
//             position.value = position.value + 1;
//
//             flightApi
//                 .updatePosition({
//                     id: 1,
//                     position: position.value,
//                 })
//                 .then((res) => {
//                     // set new position to move icon across the map
//                     location.value = res.data.location;
//                     position.value = res.data.position;
//                     // push the new coords to the line path to draw the line
//                     linePath.value = res.data.progress;
//                 });
//         }, 1000);
//     });
// });

onUnmounted(() => {
    clearInterval(intervalId1);
    clearInterval(intervalId2);
});
</script>

<template>
    <MapContainer>
        <FlightPath :id="1" />
        <FlightPath :id="2" />

        <!--        <FlightMarker :position="position2" />-->
        <!--        <FlightLine :line-path="linePath2" />-->
    </MapContainer>
</template>
