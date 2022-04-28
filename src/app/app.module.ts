import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent } from './app.component';
import { ButtonComponent } from './components/button/button.component';
import { HomeComponent } from './components/home/home.component';
import { HeadingComponent } from './components/heading/heading.component';
import { NavigationComponent } from './components/navigation/navigation.component';
import { RosesComponent } from './components/roses/roses.component';
import { RouterModule, Routes} from '@angular/router';
import { FormsModule } from '@angular/forms';
import { ContactComponent } from './components/contact/contact.component';
import { HttpClientModule } from '@angular/common/http';

// Firebase imports
import {AngularFireModule} from '@angular/fire/compat';
import { environment } from 'src/environments/environment';
import { AboutMeComponent } from './components/about-me/about-me.component';



@NgModule({
  declarations: [
    AppComponent,
    ButtonComponent,
    HomeComponent,
    HeadingComponent,
    NavigationComponent,
    RosesComponent,
    ContactComponent,
    AboutMeComponent,
  ],
  imports: [
    BrowserModule, 
    HttpClientModule,
    FormsModule,
    AngularFireModule.initializeApp(environment.firebaseConfig),
    RouterModule.forRoot([
      {path: '', redirectTo: '/home', pathMatch: 'full' },
      {path: 'home', component: HomeComponent}, 
      {path: 'contact', component:ContactComponent}, 
      {path: 'about-me', component:AboutMeComponent}
    ])
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
