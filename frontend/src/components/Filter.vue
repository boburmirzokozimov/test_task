<script setup>
defineProps({
  filter: Object
})
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
    <button @click="$emit('handleButton')">
      <svg class="feather feather-delete" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
           xmlns="http://www.w3.org/2000/svg">
        <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
        <line x1="18" x2="12" y1="9" y2="15"></line>
        <line x1="12" x2="18" y1="9" y2="15"></line>
      </svg>
    </button>
  </div>

</template>

<style scoped>

</style>