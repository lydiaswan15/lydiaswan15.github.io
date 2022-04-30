import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { AngularFireModule } from '@angular/fire/compat';
import { environment } from 'src/environments/environment';
import { HeadingComponent } from '../heading/heading.component';

import { initializeApp } from 'firebase/app';
import { getDatabase, push, ref, set, child, update} from "firebase/database";

// TODO: Replace with your app's Firebase project configuration


@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {


  constructor() { }

  ngOnInit(): void {
  }

  onSubmit(){
    console.log('hello');
  }

  testing(){

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
      name: "Lydia4",
      email: "lydiaspam15@gmail.com",
      phoneNum: 8018223510,
      message: "this is working"
    }

    const newPostKey = push(child(ref(db), 'posts')).key;

    const updates = {};
    updates['/posts/' + newPostKey] = postData;

    return update(ref(db), updates);
  }

}
