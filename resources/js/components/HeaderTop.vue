<template>
    <div>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav class="d-flex justify-content-between align-item-center">
                            <ul class="d-flex">
                                <li v-for="link in menuLinks" :key="link.index" class="routerlink-item">
                                    <router-link :to="{name: link.name}" class="nav-link" > {{link.label}}</router-link>
                                </li>
                            </ul>
                            <ul class="d-flex">
                                <li class="navlist-item">
                                    <a href="/login" class="js_btn d-flex align-items-center">
                                        <span>Accedi</span>
                                        <i class="cell-symbol fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="navlist-item">
                                    <a href="/register" class="js_btn d-flex align-items-center">
                                        <span>Registrati</span>
                                        <i class="cell-symbol fa-solid fa-right-to-bracket"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>    
                </div>  
            </div>
        </header>
    </div>
</template>

<script>
export default {
    name: 'HeaderTop',
    data(){
        return{
            menuLinks: [
                {
                    name: 'home',
                    path: '/',
                    label: 'Home'
                },
                {
                    name: 'blog',
                    path: '/blog',
                    label: 'Blog'
                },
                

            ]
        }
    }
}
</script>

<style lang="scss">
@import '../../sass/admin/common.scss';

.navlist-item, .routerlink-item{
    padding: 0 1rem;
}

.navlist-item{
    margin-top: 0.8rem;
}

</style>