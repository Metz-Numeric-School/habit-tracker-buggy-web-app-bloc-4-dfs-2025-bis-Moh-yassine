import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListOfTicketComponent } from './list-of-ticket.component';

describe('ListOfTicketComponent', () => {
  let component: ListOfTicketComponent;
  let fixture: ComponentFixture<ListOfTicketComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListOfTicketComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListOfTicketComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
