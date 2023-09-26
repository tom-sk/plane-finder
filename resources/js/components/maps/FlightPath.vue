<script setup>
import FlightLine from "@/components/maps/FlightLine.vue";
import FlightMarker from "@/components/maps/FlightMarker.vue";
import { onMounted, onUnmounted, ref } from "vue";
import flightApi from "@/api/flight-api.js";
import BaseModal from "@/components/BaseModal.vue";

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
const details = ref(null);

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

const open = ref(false);

function openModal() {
    if (details.value === null) {
        flightApi.getFlight(props.id).then((res) => {
            details.value = res.data;
            open.value = true;
        });
    } else {
        open.value = true;
    }
}
</script>

<template>
    <FlightMarker :location="location" @click="openModal" />
    <FlightLine :line-path="linePath" />

    <Teleport to="body">
        <BaseModal :open="open" @close="open = false">
            <div class="grid grid-cols-2 gap-2 text-left">
                <div>Flight code:</div>
                <div class="font-bold">{{ details.code }}</div>
                <div>Speed:</div>
                <div class="font-bold">{{ details.speed }}</div>
                <div>Details:</div>
                <div class="font-bold">{{ details.description }}</div>
            </div>
        </BaseModal>
    </Teleport>
</template>
