class DataBase
{
    static async fetchJson(_candidatsFromJson){
        let response = await fetch(_candidatsFromJson);
        let json = await response.json();
        return json;
    }
}

export { DataBase }