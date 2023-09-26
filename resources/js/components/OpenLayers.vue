<script setup>
import MapContainer from "@/components/maps/MapContainer.vue";
import FlightPath from "@/components/maps/FlightPath.vue";
</script>

<template>
    <MapContainer>
        <FlightPath :id="1" />
        <FlightPath :id="2" />
    </MapContainer>
</template>
