import { LanguageComponent } from "./language/language.component";

export class Language{
    public name: string;
    public description: string;
    public img: string;
    constructor(name: string, description: string, img: string){
        this.name = name;
        this.description = description;
        this.img = img
    }
}