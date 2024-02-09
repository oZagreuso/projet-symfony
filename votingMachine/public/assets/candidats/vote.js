import { Candidat } from './Candidat.js';

const candidatsUrl = 'http://localhost:3000/api/candidats';

const app = {
    data() {
        return {
            nbCandidats: 10,
            listeCandidats: []
        }
    },
    async mounted() {
        let rep = await fetch(candidatsUrl);
        let json = await response.json();
        for(let candidat of json){
            let c = new Candidat(candidat)
        }
    },
    computed: {
        
    },
    methods: {

    }
}

Vue.createApp(app).mount('#app');