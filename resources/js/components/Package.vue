<template>
    <div>
        <div class="container">
            <section class="home-section">
                <h2>{{newEntryTitle}}</h2>
                <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-3">
                    <div  v-for="singlePackage in packagesWithUsers" :key="singlePackage.id" class="col">
                        <div class="card my-2">
                            <h4>{{singlePackage.title}}</h4>
                            <p>Descrizione del pacchetto: {{ cutText(singlePackage.description, 100)}}</p>
                            <div>Andata: {{dateFormat(singlePackage.departure)}}</div>
                            <div>Ritorno:{{dateFormat(singlePackage.return)}}</div>
                            <div>Prezzo p.p. :{{singlePackage.price}}€</div>
                            <div>di {{ singlePackage.user ? singlePackage.user.name : ''}} {{ singlePackage.user ? singlePackage.user.lastname : ''}}</div>
                        </div>
                    </div>
                </div>
            </section>
           
            <section class="home-section">
                <h2>Offerte lowCost</h2>
                <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-3">
                    <div v-for="poveryPackage in povery" :key="poveryPackage.index" class="col">
                        <div class="card my-2">
                              <h4>{{poveryPackage.title}}</h4>
                          <p>Descrizione del pacchetto: {{ cutText(poveryPackage.description, 100)}}</p>
                          <div>Andata: {{dateFormat(poveryPackage.departure)}}</div>
                          <div>Ritorno:{{dateFormat(poveryPackage.return)}}</div>
                          <div>Prezzo p.p. :{{poveryPackage.price}}€</div>
                          <div>di {{ poveryPackage.user ? poveryPackage.user.name : ''}} {{ poveryPackage.user ? poveryPackage.user.lastname : ''}}</div>

                        </div>
                    </div>
                </div>
            </section>
           
        </div>
    </div>
</template>
<script>

export default {
    name: 'Package',
    data() {
        return{
            newEntryTitle: 'Gli ultimi arrivi',
            packages: [],
            users: [],
            povery:[],
        }
    },
    computed: {
        // calcola un nuovo pacchetto con l'utente associato
        packagesWithUsers() {
            return this.packages.map(pack => {
                return {
                    ...pack,
                    user: this.users.find(usr => usr.id === pack.user_id)
                }
            })
        }
    },
    mounted() {
        this.getPackages()
    
    },
    methods: {
        // chiamata che prende dal database tutti i pacchetti
        getPackages() {
            axios.get('http://127.0.0.1:8001/api/packages')
            .then((response) => {
               
                this.packages = response.data.packages
                this.users = response.data.users
                this.povery = response.data.povery
            })
        },
        
        // funzione che taglia il testo 
        cutText(text, limit) {
            if (text.length <= limit) {
                return text;
            }
            return text.substring(0, limit) + '...';
        }, 

        // funzione per formattare la data in formato italiano
        dateFormat(value) {
            if (!value) return '';
            return new Date(value).toLocaleDateString("it-IT", {
                day: "numeric",
                month: "numeric",
                year: "numeric"
            });
        }
    }
}
</script>

<style lang="scss">
@import '../../sass/admin/common.scss';
.home-section{
    margin: 3rem 0;
}
</style>