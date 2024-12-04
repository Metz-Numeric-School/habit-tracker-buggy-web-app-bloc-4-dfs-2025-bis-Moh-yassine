import { CommonModule } from '@angular/common';
import { HttpClient } from '@angular/common/http';
import { Component, inject } from '@angular/core';

@Component({
  selector: 'app-list-of-ticket',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './list-of-ticket.component.html',
  styleUrls: ['./list-of-ticket.component.css'],
})
export class ListOfTicketComponent {
  ticketsList: any = [];
  http = inject(HttpClient);

  ngOnInit() {
    this.http
      .get('http://localhost:3000/listoftickets')
      .subscribe((data: any) => {
        this.ticketsList = data;
        console.log(this.ticketsList);
      });
  }
}
