import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent } from './app.component';
import { ButtonComponent } from './components/button/button.component';
import { AboutMeComponent } from './components/about-me/about-me.component';
import { HeadingComponent } from './components/heading/heading.component';
import { NavigationComponent } from './components/navigation/navigation.component';
import { RosesComponent } from './components/roses/roses.component';
import { RouterModule, Routes} from '@angular/router';
import { ContactComponent } from './components/contact/contact.component';
const routes: Routes = [];
@NgModule({
  declarations: [
    AppComponent,
    ButtonComponent,
    AboutMeComponent,
    HeadingComponent,
    NavigationComponent,
    RosesComponent,
    ContactComponent
  ],
  imports: [
    BrowserModule, 
    RouterModule.forRoot([
      {path: '', redirectTo: '/about-me', pathMatch: 'full' },
      {path: 'about-me', component: AboutMeComponent}, 
      {path: 'contact', component:ContactComponent}
    ])
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
