<template>
  <div>
      <h2>Book tickets</h2>
      <div v-if="error" class="bg-red-500 text-white p-4 mb-6 rounded">{{ error }}</div>

      <div v-if="loading">Loading</div>

      <form @submit.prevent="searchTrains" v-else class="flex -mx-4 items-end">
          <div class="w-1/3 px-4">
              <label for="from" class="eticket-label">From station</label>
              <v-select id="from" v-model="from" :options="stations"/>
          </div>

          <div class="w-1/3 px-4">
              <label for="to" class="eticket-label">To station</label>
              <v-select id="to" v-model="to" :options="stations"/>
          </div>

          <div class="w-1/3 px-4">
              <label for="doj" class="eticket-label">Date of journey</label>

              <div>
                  <v-date-picker format="YYYY-MM-DD" id="doj" v-model="doj"/>
              </div>
          </div>
          <div class="min-w-max px-4">
              <button type="submit" class="eticket-btn">Search</button>
          </div>
      </form>


      {{trains}}
  </div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            from: '',
            to: '',
            doj: '',
            stations: [],
            loading: true,
            trains: [],
            error: ''
        }
    },
    mounted() {
        axios.get('/list-stations').then(res => {
            this.stations = res.data
            this.loading = false
        })
    },
    methods: {
        searchTrains() {
            const formatDate = (date) => {
                let d = new Date(date);
                let month = (d.getMonth() + 1).toString().padStart(2, '0');
                let day = d.getDate().toString().padStart(2, '0');
                let year = d.getFullYear();
                return [year, month, day].join('-');
            }

            this.loading = true;
            axios.post('/check', {
                from: this.from.code,
                to: this.to.code,
                doj: formatDate(this.doj),
            }).then(res => {
                this.trains = res.data;
                this.loading = false;
            }).catch(err => {
                this.loading = false;
                this.error = err.response.data.message;
            })
        }
    }
}
</script>

<style scoped>

</style>
