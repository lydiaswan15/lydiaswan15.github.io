import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { AngularFireModule } from '@angular/fire/compat';
import { environment } from 'src/environments/environment';
import { HeadingComponent } from '../heading/heading.component';

import { initializeApp } from 'firebase/app';
import { getDatabase, push, ref, set, child, update} from "firebase/database";
import { Contact } from './contact.model';

// TODO: Replace with your app's Firebase project configuration


@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {

  messageSubmitted = false;
  errorMessage = false;

  constructor() { }

  ngOnInit(): void {
  }

  onSubmit(){
    console.log('hello');
  }

  testing(name, email, message){

    let contact = new Contact(name.value, email.value, message.value);


    try{
      const firebaseConfig = {
        apiKey: "AIzaSyDcBB0zwhFHuKigrnHzyI-HqZ5S-dfBkOE",
        authDomain: "lydia-portfolio.firebaseapp.com",
        projectId: "lydia-portfolio",
        storageBucket: "lydia-portfolio.appspot.com",
        messagingSenderId: "377242551792",
        appId: "1:377242551792:web:476ea120fe379278490935",
        measurementId: "G-MGM17J72X4"
  
      };
      
      const app = initializeApp(firebaseConfig);
      
      // Get a reference to the database service
      const db = getDatabase(app);
  
      const postData = {
        name: contact.name,
        email: contact.email,
        message: contact.message
      }
  
      const newPostKey = push(child(ref(db), 'posts')).key;
  
      const updates = {};
      updates['/posts/' + newPostKey] = postData;

      this.messageSubmitted = true;

      return update(ref(db), updates);
    }

    catch{
      this.errorMessage = true;
    }
  }

}
