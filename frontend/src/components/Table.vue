<script setup>
const props = defineProps({
  hotels: Object
})
</script>

<template>
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
      <tbody class="text-gray-700">
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

</template>

<style scoped>

</style>