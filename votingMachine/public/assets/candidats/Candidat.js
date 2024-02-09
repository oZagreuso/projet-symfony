class Candidat
{
    constructor(_candidatsFromJson)
    {
        Object.assign(this, _candidatsFromJson);
        this.id = _candidatsFromJson.id;
        this.nom = _candidatsFromJson.lastname;
        this.prenom = _candidatsFromJson.firstname;
        this.slogan = _candidatsFromJson.slogan;
        this.pic = './asstes/candidats/'+this.id+'.jpg';

    }
}

export { Candidat };