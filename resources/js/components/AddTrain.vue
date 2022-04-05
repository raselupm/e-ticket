<template>
    <div>
        <div v-if="error" class="bg-red-500 text-white p-4 mb-6 rounded">{{ error }}</div>
        <form v-if="!loading" @submit.prevent="addTrain" method="post">
            <div class="flex -mx-4 mb-6">
                <div class="flex-1 px-4">
                    <label for="name" class="eticket-label">Name</label>
                    <input type="text" class="eticket-input" id="name" v-model="name">
                </div>

                <div class="flex-1 px-4">
                    <label for="date" class="eticket-label">Date</label>

                    <div>
                        <v-date-picker v-model="date"/>
                    </div>
                </div>
            </div>

            <div class="flex -mx-4 mb-6">
                <div class="flex-1 px-4">
                    <label for="home_station_id" class="eticket-label">Home station</label>

                    <v-select v-model="home_station_id" :options="stations"/>

                </div>

                <div class="flex-1 px-4">
                    <label for="start_time" class="eticket-label">Start time</label>
                    <div>
                        <v-date-picker type="time" v-model="start_time"/>
                    </div>
                </div>
            </div>

            <button type="submit" class="eticket-btn">Save</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "AddTrain",
    data() {
        return {
            name: '',
            date: '',
            home_station_id: '',
            start_time: '',
            loading: true,
            stations: [],
            error: false
        }
    },
    mounted() {
        axios.get('/list-stations').then(res => {
            this.stations = res.data
            this.loading = false
        })
    },
    methods: {
        addTrain() {
            axios.post('save-train', {
                name: this.name,
                date: this.date,
                home_station_id: this.home_station_id,
                start_time: this.start_time
            }).then(res => {
                console.log('train created');
            }).catch(err => {
                this.error = err.response.data.message;
            })
        }
    }
}
</script>

<style scoped>

</style>
