import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { HeadingComponent } from '../heading/heading.component';

declare var require: any
const FileSaver = require('file-saver');

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'], 
  encapsulation: ViewEncapsulation.None
})
export class HomeComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  onDownloadPDF(){
    const pdfUrl = '../assets/files/LydiaSwanson_Resume.pdf';
    const pdfName = 'lydia_swanson_resume';
    FileSaver.saveAs(pdfUrl, pdfName);
  }

}
