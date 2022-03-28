<template>
    <div>
        <v-carousel cycle 
            hide-delimiter-background 
            show-arrows-on-hover 
            height="400"
        >
            <v-carousel-item 
                v-for="(slide, i) in slides" :key="i"
                :src="'/images/' + slide.image"
            ></v-carousel-item>
        </v-carousel>
    </div>
</template>

<script>
export default {
    data () {
        return {
            slides: [
                {text: '1st', image: 'top-1.png'}, 
                {text: '2nd', image: 'top-2.jpeg'}, 
                {text: '3rd', image: 'top-3.png'}
            ],
        }
    },
}
</script>