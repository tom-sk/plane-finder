import planeBase from "./plane-base";

export default {
    getFlights() {
        return planeBase.get("/api/flights");
    },
    getPosition(flight) {
        return planeBase.get("/api/flight-position/" + flight);
    },
    updatePosition(data) {
        return planeBase.post("/api/update-position", data);
    },
    resetData() {
        return planeBase.post("/api/reset-data");
    },
};
