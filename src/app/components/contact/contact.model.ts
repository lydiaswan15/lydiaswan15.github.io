export class Contact{
    name: string;
    message: string; 
    email: string;
    constructor(name: string, email: string, message: string){
        this.name = name;
        this.message = message;
        this.email = email;
    }
}