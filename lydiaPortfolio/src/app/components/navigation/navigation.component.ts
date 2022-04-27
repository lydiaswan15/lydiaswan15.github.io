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

  constructor() {
   }

  ngOnInit(): void {
  }
  toggleAddClass(){
    console.log('Button is working');
  }
  onDownloadPDF(){
    const pdfUrl = './cse310_course_plan_complete.pdf';
    const pdfName = 'lydia_swanson_resume';
    FileSaver.saveAs(pdfUrl, pdfName);
  }

}
