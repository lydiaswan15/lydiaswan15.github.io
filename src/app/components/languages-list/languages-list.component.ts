import { Component, OnInit } from '@angular/core';
import { Language } from './language.model';

@Component({
  selector: 'app-languages-list',
  templateUrl: './languages-list.component.html',
  styleUrls: ['./languages-list.component.scss']
})
export class LanguagesListComponent implements OnInit {

  languages: Language[] = [
    new Language(
      "JavaScript", 
      "I have spent years studying JavaScript and feel the most comfortable with it.", 
      "imgURL"),
    new Language("HTML", 
    "This is a description 2", 
    "imgURL"),
    new Language("CSS/SCSS", 
    "What I love about working in the web is the chance to create sites that are functional and effective, as well as beautiful. I love working in CSS (my preferance is SCSS) to make each site beautiful.", 
    "imgURL"),
    new Language("Angular", 
    "I have recently started learning Angular and have loved it! I've worked on a few projects in Angular (including this portfolio) and have...", 
    "imgURL"),
    new Language("Other", 
    "There are many other languages/tools that I have worked with. These include, but are not limited to: .NET, MongoDB, SQL, C#, C++, Java, and more.", 
    "imgURL"),
    new Language("", "", ""),
  ]

  constructor() { }

  ngOnInit(): void {
  }

}
