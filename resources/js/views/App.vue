<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col">
                     <HeaderTop />
                    <router-view></router-view>
                </div>
            </div>
        </div>

        
       
        
    </div>
</template>

<script>
import HeaderTop from '../components/HeaderTop.vue'

export default {
    name:'App',
    components: {
       HeaderTop
    }
}
</script>