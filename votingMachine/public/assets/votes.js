import { Candidat } from './candidats/Candidat.js';

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
        let repJson = await rep.json();
        console.log(repJson);
        for(let candidat of repJson){
            let c = new Candidat(candidat)
            this.listeCandidats.push(c);
        }
        console.log(this.listeCandidats);
    },
    computed: {
        
    },
    methods: {

    }
}

Vue.createApp(app).mount('#app');