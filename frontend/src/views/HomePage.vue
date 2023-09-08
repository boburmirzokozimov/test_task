<script setup>
import {onMounted, reactive, ref, watch} from "vue";
import {debounce} from "lodash";
import axios from "axios";


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
let hotels = ref(null)
onMounted(() => {
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
      .then(res => hotels.value = res.data)
}
watch(filter, debounce(function (filter) {
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
  <div class="w-2/3 mx-auto mt-10 flex justify-center mb-6">
    <div class="w-1/4 mr-2">
      <input
          id="search"
          v-model="filter.name"
          class="border border-gray-200 p-2 w-full rounded-2xl"
          name="search"
          placeholder="Name..."
          type="search">
    </div>
    <div class="w-1/4 mr-2">
      <input
          id="bedrooms"
          v-model="filter.bedrooms"
          class="border border-gray-200 p-2 w-full rounded-2xl"
          name="bedrooms"
          placeholder="Number of bedrooms..."
          type="number">
    </div>
    <div class="w-1/4 mr-2">
      <input
          id="bathrooms"
          v-model="filter.bathrooms"
          class="border border-gray-200 p-2 w-full rounded-2xl"
          name="bathrooms"
          placeholder="Number of bedrooms..."
          type="number">
    </div>
    <div class="w-1/4 mr-2">
      <input
          id="storeys"
          v-model="filter.storeys"
          class="border border-gray-200 p-2 w-full rounded-2xl"
          name="storeys"
          placeholder="Number of storeys..."
          type="number">
    </div>
    <div class="w-1/4 mr-2">
      <input
          id="garages"
          v-model="filter.garages"
          class="border border-gray-200 p-2 w-full rounded-2xl"
          name="garages"
          placeholder="Number of garages..."
          type="number">
    </div>
    <div class="w-1/4 mr-2">
      <input
          id="price_from"
          v-model="filter.price_from"
          class="border border-gray-200 p-2 w-full rounded-2xl"
          name="price_from"
          placeholder="Price from"
          type="number">
    </div>
    <div class="w-1/4 mr-2">
      <input
          id="price_to"
          v-model="filter.price_to"
          class="border border-gray-200 p-2 w-full rounded-2xl"
          name="price_to"
          placeholder="Price to"
          type="number">
    </div>
    <button @click="handleButton">
      <svg class="feather feather-delete" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
           xmlns="http://www.w3.org/2000/svg">
        <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
        <line x1="18" x2="12" y1="9" y2="15"></line>
        <line x1="12" x2="18" y1="9" y2="15"></line>
      </svg>
    </button>
  </div>

  <div class="md:px-32 py-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
      <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
        <tr>
          <th class=" text-left py-3 px-4 uppercase font-semibold text-sm">Id</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
          <th class=" text-left py-3 px-4 uppercase font-semibold text-sm">Bedrooms</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Bathrooms</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Garages</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Storeys</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
        </tr>
        </thead>
        <tbody v-if="hotels" class="text-gray-700">
        <tr v-for="hotel in hotels">
          <td class="text-left py-3 px-4" v-text="hotel.id"></td>
          <td class="text-left py-3 px-4" v-text="hotel.name"></td>
          <td class="text-left py-3 px-4" v-text="hotel.bedrooms"></td>
          <td class="text-left py-3 px-4" v-text="hotel.bathrooms"></td>
          <td class="text-left py-3 px-4" v-text="hotel.storeys"></td>
          <td class="text-left py-3 px-4" v-text="hotel.garages"></td>
          <td class="text-left py-3 px-4" v-text="hotel.price"></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>

</style>