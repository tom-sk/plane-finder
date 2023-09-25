<script setup>
import { computed, onMounted, onUnmounted, ref } from "vue";
import PlaneIcon from "@/components/icons/PlaneIcon.vue";
const center = ref([-0.18578166984152553, 51.15573577417759]);
const start1 = ref([-0.18578166984152553, 51.15573577417759]);
const start2 = ref([-0.18578166984152553, 51.1]);

// x, y

const end = ref([-0.33180561406680537, 51.234428399919196]);

const end2 = ref([-0.16815974596153746, 51.235971822243734]);

const projection = ref("EPSG:4326");
const zoom = ref(12);

const position = ref();
const position2 = ref();

const firstPath = ref([]);
const secondPath = ref([]);

const linePath = computed(() => {
    return firstPath.value.slice(0, flightPosition.value);
});

const linePath2 = computed(() => {
    return secondPath.value.slice(0, flightPosition2.value);
});

function getPoints(start, end, speed) {
    // Page will be updated every 10 seconds

    const pathCalc = [];
    let x1 = start[0];
    let y1 = start[1];
    const x2 = end[0];
    const y2 = end[1];

    //  Vector length
    const distance = Math.hypot(x2 - x1, y2 - y1);

    // Number of steps to control speed
    let steps = Math.floor((distance * 100) / speed);

    for (steps; steps > 0; steps--) {
        x1 += (x2 - x1) / steps;
        y1 += (y2 - y1) / steps;
        pathCalc.push([x1, y1]);
    }

    return pathCalc;
}

const flightPosition = ref(0);
const flightPosition2 = ref(0);

const fly1 = () => {
    flightPosition.value++;

    if (flightPosition.value < firstPath.value.length) {
        position.value = firstPath.value[flightPosition.value];
    }
};

const fly2 = () => {
    flightPosition2.value++;

    if (flightPosition2.value < secondPath.value.length) {
        position2.value = secondPath.value[flightPosition2.value];
    }
};

let intervalId = null;

onMounted(() => {
    intervalId = setInterval(() => {
        fly1();
        fly2();
    }, 100);

    firstPath.value = getPoints(start1.value, end.value, 0.3);
    secondPath.value = getPoints(start2.value, end2.value, 0.07);
});

onUnmounted(() => {
    clearInterval(intervalId);
});

const strokeWidth = ref(10);
const strokeColor = ref("red");
</script>

<template>
    <button class="btn-default" type="button" @click="moveToEast">
        Move to the right
    </button>

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

        <ol-overlay :position="position">
            <PlaneIcon class="overlay-content" />
        </ol-overlay>

        <ol-overlay :position="position2">
            <PlaneIcon class="overlay-content" />
        </ol-overlay>

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

        <ol-vector-layer>
            <ol-source-vector>
                <ol-feature>
                    <ol-geom-line-string :coordinates="linePath2" />
                    <ol-style>
                        <ol-style-stroke
                            :color="strokeColor"
                            :width="strokeWidth"
                        />
                    </ol-style>
                </ol-feature>
            </ol-source-vector>
        </ol-vector-layer>
    </ol-map>
</template>
