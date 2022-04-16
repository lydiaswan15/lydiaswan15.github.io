import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { HeadingComponent } from '../heading/heading.component';

@Component({
  selector: 'app-about-me',
  templateUrl: './about-me.component.html',
  styleUrls: ['./about-me.component.scss'], 
  encapsulation: ViewEncapsulation.None
})
export class AboutMeComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

}
