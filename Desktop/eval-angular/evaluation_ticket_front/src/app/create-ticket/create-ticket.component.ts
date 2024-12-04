import { Component, inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { FormsModule, NgModel } from '@angular/forms';

@Component({
  selector: 'app-create-ticket',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './create-ticket.component.html',
  styleUrls: ['./create-ticket.component.css'],
})
export class CreateTicketComponent {
  http = inject(HttpClient);

  ticketData = {
    created_by: '',
    description: '',
    priorite: '',
    assigne: '',
  };

  employees: any[] = [];

  ngOnInit() {
    // Chargement des employés depuis l'API
    this.http.get('http://localhost:3000/users/employees').subscribe(
      (data: any) => {
        this.employees = data;
      },
      (error) => {
        console.error('Erreur lors du chargement des employés', error);
      }
    );
  }

  createTicket() {
    if (this.ticketData.created_by && this.ticketData.description && this.ticketData.priorite && this.ticketData.assigne) {
      // Envoi de la requête pour créer le ticket
      this.http.post('http://localhost:3000/createticket', this.ticketData).subscribe(
        () => {
          this.resetForm();
        },
        (error) => {
          console.error('Erreur lors de la création du ticket', error);
        }
      );
    } else {
      console.log('Tous les champs sont nécessaires.');
    }
  }

  resetForm() {
    this.ticketData = {
      created_by: '',
      description: '',
      priorite: '',
      assigne: '',
    };
  }
}
