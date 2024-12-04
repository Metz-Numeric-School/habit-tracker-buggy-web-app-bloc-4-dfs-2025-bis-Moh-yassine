import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {
  email: string = '';
  password: string = '';

  constructor(private http: HttpClient, private router: Router) {}

  onLogin() {
    const user = { email: this.email, password: this.password };

    this.http.post<{ jwt: string }>('http://localhost:3000/login', user)
      .subscribe({
        next: (response) => {
          localStorage.setItem('jwt', response.jwt); // Stocker le JWT dans localStorage
          this.router.navigate(['/dashboard']); // Rediriger vers le tableau de bord ou une autre page
        },
        error: () => {
          alert('Échec de la connexion. Vérifiez vos identifiants.');
        }
      });
  }
}
