import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RosesComponent } from './roses.component';

describe('RosesComponent', () => {
  let component: RosesComponent;
  let fixture: ComponentFixture<RosesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ RosesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(RosesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
