import { Component, OnInit, ViewEncapsulation } from '@angular/core';

declare var require: any
const FileSaver = require('file-saver');

@Component({
  selector: 'app-navigation',
  templateUrl: './navigation.component.html',
  styleUrls: ['./navigation.component.scss'],
  
  encapsulation: ViewEncapsulation.None
})

export class NavigationComponent implements OnInit {

  currentPage = window.location.pathname;

  constructor() {
   }

  ngOnInit(): void {
  }
  toggleAddClass(){
    console.log(this.currentPage);
  }
  onDownloadPDF(){
    const pdfUrl = '../assets/files/LydiaSwanson_Resume.pdf';
    const pdfName = 'lydia_swanson_resume';
    FileSaver.saveAs(pdfUrl, pdfName);
  }

}
