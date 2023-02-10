<template>
    <Box>
        <template #header>
            Offer Made
        </template>
        <Price :price="offer.amount" class="tett-3xl"/>
        <section class="mt-2 flex flex-col md:flex-row justify-between text-gray-500">
            <div>Made On</div>
            <div class="font-medium">{{ offerMadeOn }}</div>
        </section>
    </Box>
</template>
<script setup>
import Box from '@/Components/UI/Box.vue';
import Price from '@/Components/Price.vue';
import {computed} from 'vue';
const props = defineProps({
    offer: Object
})
const offerMadeOn = computed(
    () => new Date(props.offer.created_at).toDateString(),
)
</script>
