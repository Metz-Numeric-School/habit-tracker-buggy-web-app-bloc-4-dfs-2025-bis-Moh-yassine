import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

interface Ticket {
  created_by: string;
  description: string;
  priority: string;
  assigned_to: string;
  created_at: string;
}

interface Employee {
  username: string;
}

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
  tickets: Ticket[] = [];
  employees: Employee[] = [];

  constructor(private http: HttpClient) {}

  ngOnInit(): void {
    this.loadTickets();
    this.loadEmployees();
  }

  loadTickets(): void {
    this.http.get<Ticket[]>('http://localhost:3000/listoftickets')
      .subscribe({
        next: (data) => {
          this.tickets = data;
        },
        error: (err) => {
          console.error('Erreur lors de la récupération des tickets', err);
          alert('Impossible de charger les tickets. Veuillez réessayer.');
        }
      });
  }

  loadEmployees(): void {
    this.http.get<Employee[]>('http://localhost:3000/users/employees')
      .subscribe({
        next: (data) => {
          this.employees = data;
        },
        error: (err) => {
          console.error('Erreur lors de la récupération des employés', err);
          alert('Impossible de charger les employés. Veuillez réessayer.');
        }
      });
  }
}
