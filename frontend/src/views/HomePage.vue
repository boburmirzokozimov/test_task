<script setup>
import {onMounted, reactive, ref, watch} from "vue";
import {debounce} from "lodash";
import axios from "axios";
import Loader from "@/components/Loader.vue";
import NotFound from "@/components/NotFound.vue";
import Filter from "@/components/Filter.vue";
import Table from "@/components/Table.vue";


const filter = reactive({
  name: null,
  bedrooms: null,
  bathrooms: null,
  storeys: null,
  garages: null,
  price_from: null,
  price_to: null,
})

const BACK_URL = import.meta.env.VITE_BACKEND_URL
let hotels = ref([])
let loading = ref(false)
onMounted(() => {
  loading.value = true
  fetchData()
})

function handleResponse(response) {
  return response.text().then(text => {
    const data = text && JSON.parse(text);
    if (!response.ok) {
      if (response.status === 401) {
        // auto logout if 401 response returned from api
        console.log(response.error)
      }

      const error = (data && data.message) || response.statusText;
      return Promise.reject(error);
    }

    return data;
  });
}

const fetchData = () => {
  fetch(BACK_URL + '/api/v1/hotels')
      .then(handleResponse)
      .then((res) => {
        hotels.value = res.data
        loading.value = false
      })
}
watch(filter, debounce(function (filter) {
  loading.value = true
  axios.get(BACK_URL + '/api/v1/hotels', {
    params: {
      name: filter.name,
      bedrooms: filter.bedrooms,
      bathrooms: filter.bathrooms,
      storeys: filter.storeys,
      garages: filter.garages,
      price_from: filter.price_from,
      price_to: filter.price_to,
    }
  }).then((res) => {
    loading.value = false
    hotels.value = res.data.data
  })
}, 500))
const handleButton = () => {
  filter.name = null
  filter.bedrooms = null
  filter.bathrooms = null
  filter.storeys = null
  filter.garages = null
  filter.price_from = null
  filter.price_to = null
}
</script>

<template>
  <Filter :filter="filter" @handleButton="handleButton"/>
  <div class="md:px-32 py-8 w-full">
    <Table v-if="hotels.length" :hotels="hotels"/>
    <Loader v-if="loading"/>
    <NotFound v-if="!hotels.length"/>
  </div>
</template>

<style scoped>

</style>