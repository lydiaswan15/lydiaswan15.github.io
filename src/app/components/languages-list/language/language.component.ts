import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { Language } from '../language.model';

@Component({
  selector: 'app-language',
  templateUrl: './language.component.html',
  styleUrls: ['./language.component.scss']
})
export class LanguageComponent implements OnInit {

  @Input() language: Language;

  constructor() { }

  ngOnInit(): void {
  }

}
